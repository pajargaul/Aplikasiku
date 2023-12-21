<?php

namespace Database\Seeders;

use App\Models\Nelayan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NelayanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nelayan::create([
            'nama' => 'fajar',
            'alamat' => 'glenmore',
            'nomer_telepon' => '082139587640',
            'email' => 'fajarrosyidi80@gmail.com',
            'password' => 'fajarrs2020',
            'jenis_kapal' => 'jaring akut',
            'jumlah_abk' => '200',
        ]);
    }
}
