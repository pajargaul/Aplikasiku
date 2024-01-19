<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Nelayan;
use App\Models\Penyewaan;
use Illuminate\Support\Str;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Models\Tb_Barangsewa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
class NelayanController extends Controller
{
    public function index()
    {
        return view('nelayan.nelayan_login');
    }

    public function Login(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('nelayan')->attempt(['email' => $check['email'], 'password' =>  $check['password']])) {
            return redirect()->route('nelayan.dashboard')->with('status', 'admin login succesfully');
        } else {
            return back()->with('status', 'email atau password salah');
        }
    }

    public function Dashboard()
    {
        return view('nelayan.index');
    }
    public function nelayanLogout()
    {
        Auth::guard('nelayan')->logout();
        return redirect()->route('nelayan.login_form')->with('error', 'nelayan logout succesfully');
    }

    public function sewakanalat()
    {
        return view('nelayan.sewakanalat');
    }

    public function storesewaalat(Request $request)
    {
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
            'nelayan_id' => Auth::guard('nelayan')->user()->id,
        ]);

        if ($barangSewa) {
           $fotoPath;
        if ($barangSewa) {
            $fotoPath;
            return redirect()->route('nelayan.sewakan-alat')->with('st', 'Data barang sewa berhasil disimpan.');
        } else {
            // Jika variabel $barangSewa tidak berhasil dibuat
            return redirect()->back()->with('st', 'Gagal menyimpan data barang sewa. Silakan coba lagi.');
        }
    }
}

    public function viewproduk()
    {
        $barangSewa = Tb_Barangsewa::where('nelayan_id', Auth::guard('nelayan')->user()->id)->get();
        return view('nelayan.viewbarangsewa', compact('barangSewa'));
    }

    public function pesanan()
    {
        $barangSewa = Tb_Barangsewa::where('nelayan_id', Auth::guard('nelayan')->user()->id)->get();
        $kodeBarangArray = $barangSewa->pluck('kode_barang')->toArray();
        $pesanan = Penyewaan::whereIn('kode_barang_id', $kodeBarangArray)->get();
        return view('nelayan.pesanan', compact('pesanan'));
        // print($pesanan);
    }

    public function profile()
    {
        return view('nelayan.profile');
    }

    public function uploadpotouser(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (Auth::guard('nelayan')->user()->foto) {
            Storage::delete('public/fotonelayan/' . Auth::guard('nelayan')->user()->foto);
        }

        $fotoFile = $request->file('foto');
        $namaFileUnik = Str::uuid() . '_' . time() . '_' . $fotoFile->getClientOriginalName();
        $fotoPath = $fotoFile->storeAs('public/fotonelayan', $namaFileUnik);

        $up = DB::table('nelayans')
            ->where('email', Auth::guard('nelayan')->user()->email)
            ->update([
                'foto' => $namaFileUnik,
            ]);

        if ($up) {
            $fotoPath;
            return Redirect::route('nelayan.profile')->with('status', 'profile-updated');
        } else {
            // Jika variabel $barangSewa tidak berhasil dibuat
            return redirect()->back()->with('status', 'Gagal menyimpan. Silakan coba lagi.');
        }
    }

    public function deletepotouser(Request $request)
    {
        if (Auth::guard('nelayan')->user()->foto) {
            Storage::delete('public/fotonelayan/' . Auth::guard('nelayan')->user()->foto);
        }
        DB::table('nelayans')
            ->where('id', Auth::guard('nelayan')->user()->id)
            ->update([
                'foto' => null,
            ]);
        return redirect()->route('nelayan.profile')->with('status', 'Foto profil dihapus');
    }

    public function update(Request $request)
    {
        $up = DB::table('nelayans')
            ->where('email', Auth::guard('nelayan')->user()->email)
            ->update([
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'nomer_telepon' => $request->input('nomer_telepon'),
                'nama_kapal' => $request->input('nama_kapal'),
                'jenis_kapal' => $request->input('jenis_kapal'),
                'jumlah_abk' => $request->input('jumlah_abk'),
                'updated_at' => now(),
            ]);

        if ($up) {
            return Redirect::route('nelayan.profile')->with('status', 'profile-diperbarui');
        } else {
            // Jika variabel $barangSewa tidak berhasil dibuat
            return redirect()->back()->with('status', 'Gagal menyimpan. Silakan coba lagi.');
        }
    }

    public function barangkembali($kode_sewa, $jamkembali, $jumlah)
    {
        $penyewaan = DB::table('tb_penyewaans')
            ->select('*')
            ->where('kode_sewa', $kode_sewa)
            ->first();

        DB::table('tb_penyewaans')
            ->where('kode_sewa', $kode_sewa)
            ->update([
                'status_pengembalian' => 'telah dikembalikan',
            ]);

        DB::table('tb_barangsewas')
            ->where('kode_barang', $penyewaan->kode_barang_id)
            ->update([
                'jumlah' => $jumlah + $penyewaan->jumlah_sewa,
            ]);

        $maxKodeSewa = Pengembalian::max('kode_kembali');
        $nextNumber = intval(substr($maxKodeSewa, 1)) + 1;
        $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        $newKodeSewa = 'K' . $formattedNumber;
        $jamkembali = Carbon::parse($jamkembali);
        $sekarang = Carbon::now();
        $selisihMenit = $sekarang->diffInMinutes($jamkembali);

        if ($sekarang > $jamkembali) {

            Pengembalian::create([
                'kode_kembali' => $newKodeSewa,
                'jam_pengembalian' => Carbon::now(),
                'denda' => $selisihMenit * 500,
                'kode_sewa_id' => $kode_sewa,
            ]);

            return Redirect::route('nelayan.detailpesanan')->with('st', 'Barang dengan kode sewa ' . $kode_sewa . ' telah dikembalikan');
        } else {
            Pengembalian::create([
                'kode_kembali' => $newKodeSewa,
                'jam_pengembalian' => Carbon::now(),
                'denda' => null,
                'kode_sewa_id' => $kode_sewa,
            ]);

            return Redirect::route('nelayan.detailpesanan')->with('st', 'Barang dengan kode sewa ' . $kode_sewa . ' telah dikembalikan');
        }
    }

    public function historypesanan(){
        $barangSewa = Tb_Barangsewa::where('nelayan_id', Auth::guard('nelayan')->user()->id)->get();
        $kodeBarangArray = $barangSewa->pluck('kode_barang')->toArray();
        $sewo = Penyewaan::whereIn('kode_barang_id', $kodeBarangArray)->get();
        $kodeBarangArray2 = $sewo->pluck('kode_sewa')->toArray();
        $pesanan = Pengembalian::whereIn('kode_sewa_id', $kodeBarangArray2)->get();
        return view('nelayan.historypesanan', compact('pesanan'));
    }

    public function pengaturan(){
        return view('nelayan.pengaturan');
    }

    public function updatenamenelayan(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Format alamat email tidak valid.',
        ]);
        
    
        $loggedInUser = Auth::guard('nelayan')->user();
    
        if ($request->input('email') === $loggedInUser->email) {
            // Email yang diberikan cocok dengan email pengguna yang diotentikasi
    
            DB::table('nelayans')
                ->where('email', $loggedInUser->email)
                ->update([
                    'nama' => $request->input('nama'),
                ]);
    
            return redirect()->route('nelayan.pengaturan')->with('status', 'Nama Berhasil Diperbaharui');
        } else {
            return redirect()->route('nelayan.pengaturan')->with('status', 'Gagal');
        }
    }

    public function newpasswordnelayan(Request $request){
        $request->validate([
            'current_password' => 'required|min:8',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ], [
            'current_password.required' => 'Kata sandi saat ini harus diisi.',
            'current_password.min' => 'Panjang kata sandi saat ini harus minimal :min karakter.',
            'new_password.required' => 'Kata sandi baru harus diisi.',
            'new_password.min' => 'Panjang kata sandi baru harus minimal :min karakter.',
            'confirm_password.required' => 'Konfirmasi kata sandi baru harus diisi.',
            'confirm_password.same' => 'Konfirmasi kata sandi baru harus sama dengan kata sandi baru.',
        ]);
        
    
        $user = Auth::guard('nelayan')->user();
        if (Hash::check($request->input('current_password'), $user->password)) {
            $newPassword = Hash::make($request->input('new_password'));
    
            DB::table('nelayans')
                ->where('email', $user->email)
                ->update(['password' => $newPassword]);

            return redirect()->route('nelayan.login_form')->with('st', 'Password Berhasil Diperbaharui login kembali');
        } else {
            return redirect()->route('nelayan.pengaturan')->with('st', 'Password saat ini salah');
        }
    }

    public function updateBarangSewa(Request $request, $kode_barang)
{
        $request->validate([
            'nama_barang' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'kondisi' => 'nullable|in:Baik,Kurang_baik,Rusak',
            'jumlah' => 'nullable|integer',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barangSewa = Tb_Barangsewa::where('kode_barang', $kode_barang)->first();

        if (!$barangSewa) {
            return redirect()->back()->with(['error' , 'Barang sewa tidak ditemukan.']);
        }

        $barangSewa->nama_barang = $request->input('nama_barang');
        $barangSewa->harga = $request->input('harga');
        $barangSewa->kondisi = $request->input('kondisi');
        $barangSewa->jumlah = $request->input('jumlah');

        if ($request->hasFile('foto_barang')) {
            $fotoFile = $request->file('foto_barang');
            $namaFileUnik = Str::uuid() . '_' . time() . '_' . $fotoFile->getClientOriginalName();
            $fotoPath = $fotoFile->storeAs('public/fotobarang', $namaFileUnik);
            Storage::delete('public/fotobarang/' . $barangSewa->foto_barang);

            $barangSewa->foto_barang = $namaFileUnik;
        }
        $barangSewa->save();

        return redirect()->back()->with(['st', 'Data barang dengan kode_barang' . $kode_barang . ' sewa berhasil diperbarui.']);
}

public function deleteBarangSewa($kode_barang)
{
    try {
        $sewa = Penyewaan::where('kode_barang_id', $kode_barang)->first();
        if (!$sewa) {
            $barangSewa = Tb_Barangsewa::where('kode_barang', $kode_barang)->first();
        if (!$barangSewa) {
            return redirect()->back()->with(['error' => 'Data barang dengan kode_barang ' . $kode_barang . ' tidak ditemukan.']);
        }
        $barangSewa->delete();
        Storage::delete('public/fotobarang/' . $barangSewa->foto_barang);

        return redirect()->back()->with(['st' => 'Data barang dengan kode_barang ' . $kode_barang . ' berhasil dihapus.']);
        }
        $kode_sewa = $sewa->kode_sewa;
        $pengembalian = Pengembalian::where('kode_sewa_id', $kode_sewa)->first();
        if ($pengembalian) {
            $pengembalian->delete();
        }
        $sewa->delete();
        $barangSewa = Tb_Barangsewa::where('kode_barang', $kode_barang)->first();
        if (!$barangSewa) {
            return redirect()->back()->with(['error' => 'Data barang dengan kode_barang ' . $kode_barang . ' tidak ditemukan.']);
        }
        $barangSewa->delete();
        Storage::delete('public/fotobarang/' . $barangSewa->foto_barang);

        return redirect()->back()->with(['st' => 'Data barang dengan kode_barang ' . $kode_barang . ' berhasil dihapus.']);
    } catch (\Exception $e) {
        return redirect()->back()->with(['st' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}
}
