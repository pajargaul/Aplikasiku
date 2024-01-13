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
        'jam_pengembalian',
        'denda',
        'kode_sewa_id',
    ];

    public function ke()
    {
        return $this->belongsTo(Penyewaan::class, 'kode_sewa_id', 'kode_sewa');
    }
}
