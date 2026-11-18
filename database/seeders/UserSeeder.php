<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@perpus.com'],
            [
                'name' => 'Admin Perpustakaan',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@perpus.com'],
            [
                'name' => 'Mahasiswa Anggota',
                'password' => Hash::make('user'),
                'role' => 'user',
            ]
        );
    }
}