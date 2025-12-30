<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Super Administrator',
            'username' => 'superadmin',
            'email' => 'superadmin@game.com',
            'password' => Hash::make('superadmin123'),
            'role' => 'super_admin',
            'is_active' => true
        ]);

        Admin::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@game.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'is_active' => true
        ]);
    }
}
