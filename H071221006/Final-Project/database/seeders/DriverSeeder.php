<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriverSeeder extends Seeder
{
    public function run()
    {
        Driver::create([
            'nama_driver' => 'Nama Driver 1',
            'usia' => 30,
            'gender' => 'Laki-laki',
            // tambahkan kolom lain sesuai kebutuhan
        ]);

        // Tambahkan data lain jika diperlukan
    }
}
