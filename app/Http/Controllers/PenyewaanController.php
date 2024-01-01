<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use App\Models\Tb_Barangsewa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PenyewaanController extends Controller
{
    public function sewa($kode_barang)
    {
        $barang = Tb_Barangsewa::where('kode_barang', $kode_barang)->first();
        return view('checkout.index', ['barang' => $barang]);
    }

    public function storesewa(Request $request){
        $request->validate([
            'jumlahsewa' => 'required|integer|min:1',
            'waktu' => 'required|integer|min:1',
            'kode_barang' => 'required|exists:tb_barangsewas,kode_barang',
        ], [
            'kode_barang.exists' => 'Kode barang tidak valid.',
        ]);
    
        // Mengecek apakah jumlah barang yang tersedia cukup
        $barang = Tb_Barangsewa::where('kode_barang', $request->input('kode_barang'))->first();
        if (!$barang || $barang->jumlah < $request->input('jumlahsewa')) {
            return redirect()->back()->with('st', 'Jumlah barang tidak mencukupi untuk disewa.');
        }
    
        // Kode lain tetap sama
        $maxKodeSewa = Penyewaan::max('kode_sewa');
        $nextNumber = intval(substr($maxKodeSewa, 1)) + 1;
        $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        $newKodeSewa = 'S' . $formattedNumber;

        $current = Carbon::now();
        $jamSewa = $current;

        $waktuSewa = $request->input('waktu');
        $detik = 3600;
        $jumlahdetik =  $waktuSewa * $detik;
    
        $barangSewa = Penyewaan::create([
            'kode_sewa' => $newKodeSewa,
            'jumlah_sewa' => $request->input('jumlahsewa'),
            'jam_sewa' => $jamSewa,
            'jam_pengembalian' =>  Carbon::now()->addSeconds($jumlahdetik),
            'user_id' => Auth::user()->id,
            'kode_barang_id' => $request->input('kode_barang'),
        ]);

        DB::table('tb_barangsewas')
        ->where('kode_barang', $barang->kode_barang)
        ->update([
            'jumlah' => $barang->jumlah - $request->input('jumlahsewa'),
        ]);
    
        if ($barangSewa) {
            return redirect()->back()->with('st', 'Kamu Berhasil Menyewa Barang ini');
        } else {
            return redirect()->back()->with('st', 'Gagal menyimpan data barang sewa. Silakan coba lagi.');
        }
    }
}
