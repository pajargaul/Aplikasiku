<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Penyewaan;
use Illuminate\Support\Str;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Models\Tb_Barangsewa;
use App\Http\Middleware\Nelayan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class APIAuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email',],
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
            $articles['articles'] = array_merge($data2['articles'], $data1['articles']);
        } else {
            // Jika salah satu atau kedua panggilan gagal, atur $articles menjadi null atau array kosong sesuai kebutuhan
            $articles['articles'] = [];
        }
        return view('berita', compact('articles'));
    }

    public function ViewBarangsewa(Request $request){
        try {
            $barangsewas = Tb_Barangsewa::all();
            $barangsewas->each(function ($barangsewa) {
            $barangsewa->foto_url = asset('storage/fotobarang/' . $barangsewa->foto_barang);
            });

            $namaNelayan = $barangsewas->first()->nelayan->nama;
            $formattedData = $barangsewas->map(function ($barangsewa) use ($namaNelayan) {
                return [
                    'kode_barang' => $barangsewa->kode_barang,
                    'nama_barang' => $barangsewa->nama_barang,
                    'harga' => $barangsewa->harga,
                    'kondisi' => $barangsewa->kondisi,
                    'jumlah' => $barangsewa->jumlah,
                    'foto_barang' => $barangsewa->foto_barang,
                    'foto_url' => $barangsewa->foto_url,
                    'nelayan_id' => $barangsewa->nelayan_id,
                    'created_at' => $barangsewa->created_at,
                    'updated_at' => $barangsewa->updated_at,
                    'nama_pemilik' => $barangsewa->nelayan->nama,
                    'nomer_telepon_pemilik' => $barangsewa->nelayan->nomer_telepon,
                ];
            });
            return response()->json(['success' => true, 'data' => $formattedData], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

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
        $maxKodeBarang = Tb_Barangsewa::max('kode_barang');
        $nextNumber = intval(substr($maxKodeBarang, 1)) + 1;
        $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
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
        $userId = $request->user()->id;
        $user = User::findOrFail($userId);
        if ($user->foto) {
            Storage::delete('public/fotouser/' . $user->foto);
        }
        $user->foto = null;
        $user->save();
        return response()->json(['success' => true, 'message' => 'Foto profil dihapus.'], 200);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}


public function update(Request $request)
{
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'string',
            'nomer_telepon' => 'string|min:11',
        ]);

        $up = DB::table('users')
            ->where('email', $request->user()->email)
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
        return response()->json(['success' => true, 'data' => $user], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Pengguna tidak terautentikasi.'], 401);
        }
    } catch (\Exception $e) {
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
            'kadaluarsa' => 'required',
        ]);

        $barangSewa = Tb_Barangsewa::where('kode_barang', $kode_barang)->first();

        if (!$barangSewa) {
            return response()->json(['success' => false, 'message' => 'Barang sewa tidak ditemukan.'], 404);
        }

        $barangSewa->nama_barang = $request->input('nama_barang');
        $barangSewa->harga = $request->input('harga');
        $barangSewa->kondisi = $request->input('kondisi');
        $barangSewa->jumlah = $request->input('jumlah');
        $barangSewa->kadaluarsa = $request->input('kadaluarsa');

        if ($request->hasFile('foto_barang')) {
            $fotoFile = $request->file('foto_barang');
            $namaFileUnik = Str::uuid() . '_' . time() . '_' . $fotoFile->getClientOriginalName();
            $fotoPath = $fotoFile->storeAs('public/fotobarang', $namaFileUnik);
            Storage::delete('public/fotobarang/' . $barangSewa->foto_barang);

            $barangSewa->foto_barang = $namaFileUnik;
        }
        $barangSewa->save();

        return response()->json(['success' => true, 'message' => 'Data barang dengan kode_barang' . $kode_barang . 'sewa berhasil diperbarui.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

public function tambahBarangSewa(Request $request)
{
    try {
        $request->validate([
            'nama_barang' => 'required|string',
            'harga' => 'required|numeric',
            'kondisi' => 'required|in:Baik,Kurang_baik,Rusak',
            'jumlah' => 'required|integer',
            'foto_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kadaluarsa' => 'required',
        ]);

        $maxKodeBarang = Tb_Barangsewa::max('kode_barang');
        $nextNumber = intval(substr($maxKodeBarang, 1)) + 1;
        $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
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
            'kadaluarsa' => $request->input('kadaluarsa'),
        ]);

        if ($barangSewa) {
            $fotoPath;
            return response()->json(['success' => true, 'message' => 'Data barang sewa berhasil ditambahkan dengan kode barang ' . $newKodeBarang]);
        }else {
            return response()->json(['error' => true, 'message' => 'Data barang sewa gagal ditambahkan.']);
        }
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

public function ViewBarangsewanelayan(Request $request){
    try {
        $barangsewas = Tb_Barangsewa::where('nelayan_id', $request->user()->id)->get();
        $namaNelayan = $barangsewas->first()->nelayan->nama;
        $formattedData = $barangsewas->map(function ($barangsewa) use ($namaNelayan) {
            return [
                'kode_barang' => $barangsewa->kode_barang,
                'nama_barang' => $barangsewa->nama_barang,
                'harga' => $barangsewa->harga,
                'kondisi' => $barangsewa->kondisi,
                'jumlah' => $barangsewa->jumlah,
                'foto_barang' => $barangsewa->foto_barang,
                'nelayan_id' => $barangsewa->nelayan_id,
                'created_at' => $barangsewa->created_at,
                'updated_at' => $barangsewa->updated_at,
                'nama_pemilik' => $barangsewa->nelayan->nama,
                'nomer_telepon_pemilik' => $barangsewa->nelayan->nomer_telepon,
            ];
        });

        return response()->json(['success' => true, 'data' => $formattedData], 200);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}


public function keranjangApi(Request $request)
{
    $pesanan = Penyewaan::where('user_id', $request->user()->id)
                ->whereNull('jam_sewa')
                ->whereNull('jam_pengembalian')
                ->whereNull('status_pengembalian')
                ->get();
    $namaNelayan = $pesanan->first()->barangsewa->kode_barang;
    $formattedData = $pesanan->map(function ($sewo) use ($namaNelayan) {
        return [
            'kode_barang' => $sewo->barangsewa->kode_barang,
            'kode_sewa' => $sewo->kode_sewa,
            'nama_pemilik' => $sewo->barangsewa->nelayan->nama,
            'nama_telepon_pemilik' => $sewo->barangsewa->nelayan->nomer_telepon,
            'jumlah_sewa' => $sewo->jumlah_sewa,
            'jumlah_waktu' => $sewo->jumlah_waktu . ' jam',
            'total_harga' => $sewo->total_harga,
        ];
    });
    return response()->json(['success' => true, 'data' => $formattedData], 200);
}

public function keranjangApi2(Request $request)
{
    $pesanan = Penyewaan::where('user_id', $request->user()->id)
                ->wherenotNull('jam_sewa')
                ->wherenotNull('jam_pengembalian')
                ->whereNull('status_pengembalian')
                ->get();
                $namaNelayan = $pesanan->first()->barangsewa->kode_barang;
                $formattedData = $pesanan->map(function ($sewo) use ($namaNelayan) {
                    return [
                        'kode_barang' => $sewo->barangsewa->kode_barang,
                        'kode_sewa' => $sewo->kode_sewa,
                        'nama_pemilik' => $sewo->barangsewa->nelayan->nama,
                        'nama_telepon_pemilik' => $sewo->barangsewa->nelayan->nomer_telepon,
                        'jumlah_sewa' => $sewo->jumlah_sewa,
                        'jumlah_waktu' => $sewo->jumlah_waktu . ' jam',
                        'total_harga' => $sewo->total_harga,
                        'jam_mulai_sewa' => $sewo->jam_sewa,
                        'batas_pengembalian' => $sewo->jam_pengembalian,
                        'status_pengembalian' => 'belum dikembalikan',
                    ];
                });
                return response()->json(['success' => true, 'data' => $formattedData], 200);
}

public function barangKembaliApi()
{
    $sewa = Penyewaan::where('user_id', auth()->id())->get();
    $kodeBarangArray2 = $sewa->pluck('kode_sewa')->toArray();
    $pengembalian = Pengembalian::whereIn('kode_sewa_id', $kodeBarangArray2)->get();
    $barangkembali = $pengembalian->first()->ke->kode_sewa;
    $formattedData = $pengembalian->map(function ($balek) use ($barangkembali) {
        return [
            'kode_kembali' => $balek->kode_kembali,
            'kode_sewa' => $balek->ke->kode_sewa,
            'kode_barang' => $balek->ke->barangsewa->kode_barang,
            'nama_barang' => $balek->ke->barangsewa->nama_barang,
            'nama_pemilik' => $balek->ke->barangsewa->nelayan->nama,
            'nama_telepon_pemilik' => $balek->ke->barangsewa->nelayan->nomer_telepon,
            'jumlah_sewa' => $balek->ke->jumlah_sewa . " ".$balek->ke->barangsewa->nama_barang, 
            'jumlah_waktu' => $balek->ke->jumlah_waktu . ' jam',
            'jam_mulai_sewa' => $balek->ke->jam_sewa,
            'batas_pengembalian' => $balek->ke->jam_pengembalian,
            'status_pengembalian' => $balek->ke->status_pengembalian,
            'jam_user_telah_mengembalikan' => $balek->jam_pengembalian,
            'denda' => "Rp. ".$balek->denda,
        ];
    });
    return response()->json(['success' => true, 'data' => $formattedData], 200);
}

public function storesewa(Request $request)
{
    $validator = Validator::make($request->all(), [
        'jumlahsewa' => 'required|integer|min:1',
        'waktu' => 'required|integer|min:1',
        'kode_barang' => 'required|exists:tb_barangsewas,kode_barang',
    ], [
        'kode_barang.exists' => 'Kode barang tidak valid.',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    $barang = Tb_Barangsewa::where('kode_barang', $request->input('kode_barang'))->first();
    if (!$barang || $barang->jumlah < $request->input('jumlahsewa')) {
        return response()->json(['error' => 'Jumlah barang tidak mencukupi untuk disewa.'], 422);
    }

    $maxKodeSewa = Penyewaan::max('kode_sewa');
    $nextNumber = intval(substr($maxKodeSewa, 1)) + 1;
    $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    $newKodeSewa = 'S' . $formattedNumber;

    $total = $request->input('waktu') * $request->input('jumlahsewa') * $barang->harga;

    $barangSewa = Penyewaan::create([
        'kode_sewa' => $newKodeSewa,
        'jumlah_sewa' => $request->input('jumlahsewa'),
        'jumlah_waktu' => $request->input('waktu'),
        'user_id' => Auth::user()->id,
        'kode_barang_id' => $request->input('kode_barang'),
        'total_harga' => $total,
    ]);

    DB::table('tb_barangsewas')
        ->where('kode_barang', $barang->kode_barang)
        ->update([
            'jumlah' => $barang->jumlah - $request->input('jumlahsewa'),
        ]);

    if ($barangSewa) {
        return response()->json(['message' => 'Kamu Akan Segera Menyewa Barang ini, Barang Telah dimasukan Kedalam Keranjang, Silahkan Konfirmasikan Penyewaan anda Kepada Pemilik Barang untuk Melakukan Transaksi Selanjutnya']);
    } else {
        return response()->json(['error' => 'Gagal menyimpan data barang sewa. Silakan coba lagi.'], 500);
    }
}

public function cancel($kode_barang, $jumlah, $jumlah2, $kode_sewa)
    {
        try {
            $cancel = Penyewaan::where([
                'kode_sewa'=> $kode_sewa,
                'jam_sewa' => null,
                'jam_pengembalian'=> null,
                'status_pengembalian' => null,
            ])->firstOrFail();

            DB::table('tb_barangsewas')
                ->where('kode_barang', $kode_barang)
                ->update([
                    'jumlah' => $jumlah + $jumlah2,
                ]);

            $cancel->delete();
            
            return response()->json(['message' => 'Penyewaan berhasil dibatalkan'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Penyewaan tidak ditemukan'], 404);
        }
    }
}
