<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Menghapus data sebelumnya jika ada
        User::truncate();

        // Buat akun pengguna baru
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang diinginkan
        ]);
    }
}