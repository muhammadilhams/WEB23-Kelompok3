<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        User::create([
            'id' => env("SUPERADMIN_USERNAME"),
            'username' => env("SUPERADMIN_USERNAME"),
            'email' => env("SUPERADMIN_EMAIL"),
            'password' => Hash::make(env("SUPERADMIN_PASSWORD")),
            'name' => env("SUPERADMIN_NAME"),
            'role' => "superadmin",
        ]);
    }
}
