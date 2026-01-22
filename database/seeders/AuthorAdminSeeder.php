<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthorAdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            'author_id' => 1,
            'full_name' => 'Sample Author',
            'email' => 'author@example.com',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('admins')->insert([
            'full_name' => 'Sample Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
