<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
            // Create one admin user
    User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'), // Or use Hash::make()
        'role' => 'admin',
    ]);

    // Create a regular staff user
    User::create([
        'name' => 'Staff User',
        'email' => 'staff@example.com',
        'password' => bcrypt('password'),
        'role' => 'staff',
    ]);

    }

}
