<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::insert([
            'name' => 'Administrator',
            'email' => 'willy.permana@bkkbn.go.id',
            'password' => Hash::make('p@S5w0rD'),
            'username' => 'admin',
            'role' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
