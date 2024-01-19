<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Nelayan;
use App\Models\Pengembalian;
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
        $barang = Tb_Barangsewa::where('kode_barang', $request->input('kode_barang'))->first();
        if (!$barang || $barang->jumlah < $request->input('jumlahsewa')) {
            return redirect()->back()->with('st', 'Jumlah barang tidak mencukupi untuk disewa.');
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
                return redirect()->back()->with('berhasil', 'Kamu Akan Segera Menyewa Barang ini, Barang Telah dimasukan Kedalam Keranjang, Silahkan Konfirmasikan Penyewaan anda Kepada Pemilik Barang untuk Melakukan Transaksi Selanjutnya');
                    } else {
                        return redirect()->back()->with('st', 'Gagal menyimpan data barang sewa. Silakan coba lagi.');
                    }
    }

    public function mulaisewa($kode_sewa){
        $penyewaan = DB::table('tb_penyewaans')
        ->select('*')
        ->where('kode_sewa', $kode_sewa)
        ->first();

        $waktuSewa = $penyewaan->jumlah_waktu;
        $jumlahdetik = $waktuSewa * 3600;
        $jamSewa = Carbon::now();
        $jamPengembalian = $jamSewa->copy()->addSeconds($jumlahdetik);

        DB::table('tb_penyewaans')
                ->where('kode_sewa', $kode_sewa)
                ->update([
                    'jam_sewa' => $jamSewa,
                    'jam_pengembalian' => $jamPengembalian,
                ]);

        return redirect()->back()->with('st', 'Barang dengan kode sewa ' .$kode_sewa . ' berhasil disewakan. silahkan cek pada halaman detail pesanan');
    }

    public function keranjang()
    {
        $pesanan = Penyewaan::where('user_id', Auth::user()->id)->get();
        return view('checkout.keranjang', compact('pesanan'));
    }

    public function hubungiPemilik($id)
    {
        $nelayan = Nelayan::findOrFail($id);
        $nomorTelepon = $nelayan->nomer_telepon;
        $whatsappNumber = '62' . ltrim($nomorTelepon, '0');
        $whatsappUrl = "https://wa.me/{$whatsappNumber}";
        return redirect($whatsappUrl);
    }

    public function detailpesanan(){
        $barangSewa = Tb_Barangsewa::where('nelayan_id', Auth::guard('nelayan')->user()->id)->get();
        $kodeBarangArray = $barangSewa->pluck('kode_barang')->toArray();
        $pesanan = Penyewaan::whereIn('kode_barang_id', $kodeBarangArray)->get();
        return view('nelayan.detailpesanan',compact('pesanan'));
    }

    public function viewbaranguser(){
        $pesanan = Penyewaan::where('user_id', Auth::user()->id)->get();
        return view('checkout.viewbaranguser', compact('pesanan'));
    }

    public function barangkembali(){
        $sewo = Penyewaan::where('user_id', Auth::user()->id)->get();
        $kodeBarangArray2 = $sewo->pluck('kode_sewa')->toArray();
        $pesanan = Pengembalian::whereIn('kode_sewa_id', $kodeBarangArray2)->get();
        return view('checkout.barangkembali', compact('pesanan'));
    }

    public function cancel($kode_barang, $jumlah, $jumlah2, $kode_sewa){
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
            return redirect()->back()->with('st', 'Anda telah membatalkan penyewaan barang tersebut');
        } catch (\Exception $e) {
            return redirect()->back()->with('st', 'Penyewaan tidak ditemukan');
        }
    }
}
