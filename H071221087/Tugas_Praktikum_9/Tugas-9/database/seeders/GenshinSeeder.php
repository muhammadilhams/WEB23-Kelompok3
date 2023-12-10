<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenshinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("genshins")->insert([
            'karakter'=> 'Zhongli',
            'role' => 'Archon',
            'tipe' => 'Geo',
            'asal'=> 'Liyue',
            'deskripsi'=> 'Archon yang sangat kuat di bagain pertahanan',
        ]);
    }
}
