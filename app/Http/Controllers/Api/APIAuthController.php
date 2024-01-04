<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tb_Barangsewa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class APIAuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email',],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succes' => false,
                'masage' => 'terjadi kesalahan',
                'data' => $validator->errors(),
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $succes['email'] = $user->email;
        $succes['name'] = $user->name;

        return response()->json([
            'succes' => true,
            'masage' => 'register berhasil',
            'data' => $succes
        ]);
    }

    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $auth = Auth::user();
            $succes['token'] = $auth->createToken('auth_token')->plainTextToken;
            $succes['name'] = $auth->name;

            return response()->json([
                'succes' => true,
                'masage' => 'login berhasil',
            'data' => $succes
            ]);

        }else{
            return response()->json([
                'succes' => false,
                'masage' => 'email dan password salah',
            'data' => null
            ]);
        }
    }

    public function getMarineNews()
    {
        $baseUrl = 'https://newsapi.org/v2/top-headlines?country=id&apiKey=1371b0a67af24ce096f57c0418708c31';
        $Url = 'https://newsapi.org/v2/everything?domains=detik.com&apiKey=1371b0a67af24ce096f57c0418708c31';

        // Ambil respons dari kedua URL
        $response1 = Http::get($baseUrl);
        $response2 = Http::get($Url);

        // Periksa jika keduanya berhasil
        if ($response1->successful() && $response2->successful()) {
            // Ambil data dari JSON respons
            $data1 = $response1->json();
            $data2 = $response2->json();

            // Gabungkan data dari kedua respons
            $articles['articles'] = array_merge($data2['articles'], $data1['articles']);
        } else {
            // Jika salah satu atau kedua panggilan gagal, atur $articles menjadi null atau array kosong sesuai kebutuhan
            $articles['articles'] = [];
        }

        // Kirim data ke view
        return view('berita', compact('articles'));
    }

    public function ViewBarangsewa(Request $request){
        try {
            $barangsewas = Tb_Barangsewa::all();
            return response()->json(['success' => true, 'data' => $barangsewas], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
