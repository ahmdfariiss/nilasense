<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat Akun Admin
        User::create([
            'name' => 'Admin NilaSense',
            'email' => 'admin@nilasense.com',
            'password' => Hash::make('admin1234'), // Ganti 'password' dengan password yang aman
            'role' => 'admin',
        ]);

        // Buat Akun Customer (Contoh)
        User::create([
            'name' => 'Ahmad Faris',
            'email' => 'afarisalaziz201@gmail.com',
            'password' => Hash::make('aziz1234'),
            'role' => 'customer',
        ]);
    }
}