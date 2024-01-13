<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tb_Barangsewa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
=======
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tb_Barangsewa;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Nelayan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
use Illuminate\Support\Facades\Validator;

class APIAuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
<<<<<<< HEAD
            'username' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email',],
            'alamat'=> ['required', 'string'],
            'notelepon'=> ['required', 'string'],
=======
            'email' => ['required', 'string', 'lowercase', 'email',],
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
            'password' => ['required'],
            'confirm_password' => 'required|same:password',
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

<<<<<<< HEAD
        $succes['name'] = $user->name;
        $succes['username'] = $user->username;
        $succes['email'] = $user->email;
        $succes['alamat'] = $user->alamat;
        $succes['notelepon'] = $user->notelepon;
=======
        $succes['email'] = $user->email;
        $succes['name'] = $user->name;
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055

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

<<<<<<< HEAD

=======
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
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

<<<<<<< HEAD
=======

    public function loginnelayan(Request $request)
{
    try {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('nelayan')->attempt($credentials)) {
            $user = Auth::guard('nelayan')->user();
            $success['token'] = $user->createToken('auth_token')->plainTextToken;
            $success['name'] = $user->name;

            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Email dan password salah',
                'data' => null
            ]);
        }
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
            'data' => null
        ], 500);
    }
}

>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
    public function getMarineNews()
    {
        $baseUrl = 'https://newsapi.org/v2/top-headlines?country=id&apiKey=1371b0a67af24ce096f57c0418708c31';
        $Url = 'https://newsapi.org/v2/everything?domains=detik.com&apiKey=1371b0a67af24ce096f57c0418708c31';
<<<<<<< HEAD

        // Ambil respons dari kedua URL
        $response1 = Http::get($baseUrl);
        $response2 = Http::get($Url);

=======
    
        // Ambil respons dari kedua URL
        $response1 = Http::get($baseUrl);
        $response2 = Http::get($Url);
    
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
        // Periksa jika keduanya berhasil
        if ($response1->successful() && $response2->successful()) {
            // Ambil data dari JSON respons
            $data1 = $response1->json();
            $data2 = $response2->json();
<<<<<<< HEAD

=======
    
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
            // Gabungkan data dari kedua respons
            $articles['articles'] = array_merge($data2['articles'], $data1['articles']);
        } else {
            // Jika salah satu atau kedua panggilan gagal, atur $articles menjadi null atau array kosong sesuai kebutuhan
            $articles['articles'] = [];
        }
<<<<<<< HEAD

=======
    
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
        // Kirim data ke view
        return view('berita', compact('articles'));
    }

    public function ViewBarangsewa(Request $request){
        try {
            $barangsewas = Tb_Barangsewa::all();
<<<<<<< HEAD
=======
    
            $barangsewas->each(function ($barangsewa) {
                $barangsewa->foto_url = asset('storage/fotobarang/' . $barangsewa->foto_barang);
            });
    
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
            return response()->json(['success' => true, 'data' => $barangsewas], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
<<<<<<< HEAD
=======

    public function storesewaalat(Request $request)
{
    try {
        $request->validate([
            'nama_barang' => 'required|string',
            'harga' => 'required|numeric',
            'kondisi' => 'required|in:Baik,Kurang_baik,Rusak',
            'jumlah' => 'required|integer',
            'foto_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mendapatkan nilai maksimum kode_barang dari database
        $maxKodeBarang = Tb_Barangsewa::max('kode_barang');

        // Mengekstrak nomor dari kode_barang, menambahkan 1, dan memformatnya menjadi tiga digit dengan leading zero
        $nextNumber = intval(substr($maxKodeBarang, 1)) + 1;

        // Format nomor menjadi tiga digit dengan leading zero
        $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        // Membuat kode_barang baru
        $newKodeBarang = 'B' . $formattedNumber;

        $fotoFile = $request->file('foto_barang');
        $namaFileUnik = Str::uuid() . '_' . time() . '_' . $fotoFile->getClientOriginalName();
        $fotoPath = $fotoFile->storeAs('public/fotobarang', $namaFileUnik);

        $barangSewa = Tb_Barangsewa::create([
            'kode_barang' => $newKodeBarang,
            'nama_barang' => $request->input('nama_barang'),
            'harga' => $request->input('harga'),
            'kondisi' => $request->input('kondisi'),
            'jumlah' => $request->input('jumlah'),
            'foto_barang' => $namaFileUnik,
            'nelayan_id' => $request->user()->id,
        ]);

        if ($barangSewa) {
            return response()->json(['success' => true, 'message' => 'Data barang sewa berhasil disimpan.']);
        } else {
            return response()->json(['gagal' => false, 'message' => 'Gagal menyimpan data barang sewa. Silakan coba lagi.'], 500);
        }
    } catch (\Exception $e) {
        return response()->json(['gagal' => false, 'message' => $e->getMessage()], 500);
    }
}

public function deleteBarangSewa($kode_barang)
{
    try {
        $barangSewa = Tb_Barangsewa::where('kode_barang', $kode_barang)->first();
         $barangSewa->delete();
        Storage::delete('public/fotobarang/' . $barangSewa->foto_barang);
        return response()->json(['success' => true, 'message' => 'Data barang sewa berhasil dihapus.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

public function uploadpotouser(Request $request)
{
    try {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (Auth::user()->foto) {
            Storage::delete('public/fotouser/' . Auth::user()->foto);
        }

        $fotoFile = $request->file('foto');
        $namaFileUnik = Str::uuid() . '_' . time() . '_' . $fotoFile->getClientOriginalName();
        $fotoPath = $fotoFile->storeAs('public/fotouser', $namaFileUnik);

        $up = DB::table('users')
            ->where('email', Auth::user()->email)
            ->update([
                'foto' => $namaFileUnik,
            ]);

        if ($up) {
            return response()->json(['success' => true, 'message' => 'Foto profil berhasil diperbarui.', 'foto_path' => asset('storage/fotouser/' . $namaFileUnik)], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan. Silakan coba lagi.'], 500);
        }
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

public function deletepotouser(Request $request)
{
    try {
        // Ambil ID user dari request atau sesuaikan dengan kebutuhan
        $userId = $request->user()->id;

        // Ambil user dari database
        $user = User::findOrFail($userId);

        // Hapus foto dari storage jika ada
        if ($user->foto) {
            Storage::delete('public/fotouser/' . $user->foto);
        }

        // Hapus foto dari database
        $user->foto = null;
        $user->save();

        // Berikan respons JSON sesuai kebutuhan
        return response()->json(['success' => true, 'message' => 'Foto profil dihapus.'], 200);
    } catch (\Exception $e) {
        // Berikan respons JSON untuk kasus kesalahan
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}


public function update(Request $request)
{
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'string',
            'nomer_telepon' => 'string',
        ]);

        $up = DB::table('users')
            ->where('email', Auth::user()->email)
            ->update([
                'name' => $request->input('name'),
                'alamat' => $request->input('alamat'),
                'nomer_telepon' => $request->input('nomer_telepon'),
            ]);

        if ($up) {
            return response()->json(['success' => true, 'message' => 'Profil berhasil diperbarui.'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan. Silakan coba lagi.'], 500);
        }
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

public function getLoggedInUserData(Request $request)
{
    try {
        $user = $request->user();

        if ($user) {
            // Pengguna sedang login, kembalikan data dalam respons JSON
            return response()->json(['success' => true, 'data' => $user], 200);
        } else {
            // Tidak ada pengguna yang sedang login
            return response()->json(['success' => false, 'message' => 'Pengguna tidak terautentikasi.'], 401);
        }
    } catch (\Exception $e) {
        // Kesalahan server
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

public function updateBarangSewa(Request $request, $kode_barang)
{
    try {
        $request->validate([
            'nama_barang' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'kondisi' => 'nullable|in:Baik,Kurang_baik,Rusak',
            'jumlah' => 'nullable|integer',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        

        // Temukan barang sewa berdasarkan kode_barang
        $barangSewa = Tb_Barangsewa::where('kode_barang', $kode_barang)->first();

        if (!$barangSewa) {
            return response()->json(['success' => false, 'message' => 'Barang sewa tidak ditemukan.'], 404);
        }

        // Perbarui data barang sewa
        $barangSewa->nama_barang = $request->input('nama_barang');
        $barangSewa->harga = $request->input('harga');
        $barangSewa->kondisi = $request->input('kondisi');
        $barangSewa->jumlah = $request->input('jumlah');

        // Perbarui foto barang jika ada yang diunggah
        if ($request->hasFile('foto_barang')) {
            $fotoFile = $request->file('foto_barang');
            $namaFileUnik = Str::uuid() . '_' . time() . '_' . $fotoFile->getClientOriginalName();
            $fotoPath = $fotoFile->storeAs('public/fotobarang', $namaFileUnik);

            // Hapus foto lama dari penyimpanan
            Storage::delete('public/fotobarang/' . $barangSewa->foto_barang);

            $barangSewa->foto_barang = $namaFileUnik;
        }

        // Simpan perubahan ke database
        $barangSewa->save();

        return response()->json(['success' => true, 'message' => 'Data barang sewa berhasil diperbarui.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}


>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
}
