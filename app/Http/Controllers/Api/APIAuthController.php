<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
}
