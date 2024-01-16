<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Barangsewa extends Model
{
    use HasFactory;
    protected $table = 'tb_barangsewas';
    protected $primaryKey = 'kode_barang';
    protected $keyType = 'string';
    protected $fillable = ['kode_barang', 
                            'nama_barang', 
                            'harga',
                            'kondisi',
                            'jumlah',
                            'foto_barang',
                            'nelayan_id',];

    public function nelayan()
    {
        return $this->belongsTo(Nelayan::class);
    }
}
