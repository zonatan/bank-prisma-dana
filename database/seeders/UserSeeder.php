<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // === ADMIN ===
        User::updateOrCreate(
            ['email' => 'admin@prisma.com'],
            [
                'name' => 'Admin Bank',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ]
        );

        // === CUSTOMER 1 ===
        User::updateOrCreate(
            ['email' => 'budi@customer.com'],
            [
                'name' => 'Budi Santoso',
                'password' => Hash::make('123456'),
                'role' => 'customer'
            ]
        );

        // === CUSTOMER 2 ===
        User::updateOrCreate(
            ['email' => 'siti@customer.com'],
            [
                'name' => 'Siti Nurhaliza',
                'password' => Hash::make('123456'),
                'role' => 'customer'
            ]
        );

        // === TAMBAHAN (opsional) ===
        User::updateOrCreate(
            ['email' => 'andi@customer.com'],
            [
                'name' => 'Andi Wijaya',
                'password' => Hash::make('123456'),
                'role' => 'customer'
            ]
        );
    }
}