<?php

// Test script untuk cek admin login
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Testing Admin Login ===\n\n";

// Check if admin exists
$admin = \App\Models\Admin::where('username', 'superadmin')->first();

if ($admin) {
    echo "✅ Admin found!\n";
    echo "Name: " . $admin->name . "\n";
    echo "Username: " . $admin->username . "\n";
    echo "Role: " . $admin->role . "\n";
    echo "Active: " . ($admin->is_active ? 'Yes' : 'No') . "\n\n";
    
    // Test password
    $testPassword = 'superadmin123';
    if (\Hash::check($testPassword, $admin->password)) {
        echo "✅ Password 'superadmin123' is CORRECT!\n";
    } else {
        echo "❌ Password 'superadmin123' is WRONG!\n";
    }
} else {
    echo "❌ Admin NOT found in database!\n";
    echo "Running seeder...\n";
    
    // Run seeder
    \Artisan::call('db:seed', ['--class' => 'SuperAdminSeeder']);
    echo "Seeder completed!\n";
}
