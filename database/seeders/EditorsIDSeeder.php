<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EditorsID;

class EditorsIDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1000; $i <= 1010; $i++) {
            EditorsID::create([
                'editor_number' => $i,
                'status' => 'Inactive',
            ]);
        }
    }
}
