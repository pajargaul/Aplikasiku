<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;
    protected $table = 'tb_penyewaans';

    protected $fillable = [
        'kode_sewa',
        'jumlah_sewa',
        'jumlah_waktu',
        'jam_sewa',
        'jam_pengembalian',
        'status_pengembalian',
        'user_id',
        'kode_barang_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function barangSewa()
    {
        return $this->belongsTo(Tb_Barangsewa::class, 'kode_barang_id', 'kode_barang');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}
