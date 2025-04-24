<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_users')->insert([
            [
                'name' => 'John Doe',
                'type' => 'admin',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'type' => 'user',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'), // Plain text password
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alex Johnson',
                'type' => 'moderator',
                'email' => 'alex@example.com',
                'password' => Hash::make('password123'), // Plain text password
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
