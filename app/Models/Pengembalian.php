<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'tb_pengembalians';

    protected $fillable = [
        'kode_kembali',
        'kondisi_barang',
        'jam_pengembalian',
        'foto_sesudah',
        'denda',
        'kode_sewa_id',
    ];

    public function user()
    {
        return $this->belongsTo(Penyewaan::class, 'kode_sewa_id');
    }
}
