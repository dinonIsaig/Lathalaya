<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Editor;
use App\Models\EditorsID;
use Faker\Factory as Faker;

class EditorWithIDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1000; $i <= 1030; $i++) {

            $status = 'inactive';
            $shouldCreateEditor = false;

            if ($i > 1010) {
                $shouldCreateEditor = (bool)rand(0, 1);

                if ($shouldCreateEditor) {
                    $status = 'active';
                }
            }

            EditorsID::create([
                'editor_number' => $i,
                'status' => $status,
            ]);

            if ($shouldCreateEditor) {
                Editor::create([
                    'editor_number' => $i,
                    'full_name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'password' => Hash::make('password123'),
                ]);
            }
        }

        $editors = [
        ['id' => 1000, 'name' => 'Deenawnn', 'email' => 'deenawnn@example.com'],
        ['id' => 1001, 'name' => 'Hiaxynth', 'email' => 'hiaxynth@example.com'],
        ['id' => 1002, 'name' => 'joyirel',  'email' => 'joyirel@example.com'],
        ['id' => 1003, 'name' => 'ebreel',   'email' => 'ebreel@example.com'],
        ];

        foreach ($editors as $data) {

            DB::table('editors')->insert([
                'editor_number' => $data['id'],
                'full_name'     => $data['name'],
                'email'         => $data['email'],
                'password'      => Hash::make('password123'),
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            DB::table('editorsID')
                ->where('editor_number', $data['id'])
                ->update(['status' => 'active']);
    }

    }
}

