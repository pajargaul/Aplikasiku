<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tb_Barangsewa;

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
            return back()->with('status', 'invalid email or password');
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

        // Menggunakan kode_barang baru saat membuat entri baru di database
        $barangSewa = Tb_Barangsewa::create([
            'kode_barang' => $newKodeBarang,
            'nama_barang' => $request->input('nama_barang'),
            'harga' => $request->input('harga'),
            'kondisi' => $request->input('kondisi'),
            'jumlah' => $request->input('jumlah'),
            'foto_barang' => $namaFileUnik,
            'nelayan_id' => Auth::guard('nelayan')->user()->id,
        ]);

        // Pengecekan variabel $barangSewa
        if ($barangSewa) {
           $fotoPath;
            return redirect()->route('nelayan.sewakan-alat')->with('st', 'Data barang sewa berhasil disimpan.');
        } else {
            // Jika variabel $barangSewa tidak berhasil dibuat
            return redirect()->back()->with('st', 'Gagal menyimpan data barang sewa. Silakan coba lagi.');
        }
    }

    public function viewproduk(){
        $barangSewa = Tb_Barangsewa::where('nelayan_id', Auth::guard('nelayan')->user()->id)->get();
        return view('nelayan.viewbarangsewa', compact('barangSewa'));
    }
}
