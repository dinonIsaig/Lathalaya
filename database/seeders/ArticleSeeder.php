<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // 1. Get all existing author IDs to ensure foreign key integrity
        $authorIds = DB::table('authors')->pluck('author_id')->toArray();

        // Check if authors exist to avoid errors
        if (empty($authorIds)) {
            $this->command->error("No authors found. Please seed the authors table first!");
            return;
        }

        $categories = [
            'Politics & Government', 'Business & Finance', 'Technology & Science', 
            'Health & Fitness', 'Sports', 'Lifestyle & Travel', 
            'Entertainment', 'Environment & Nature', 'Obituaries'
        ];

        // 2. Loop to create 50 random records
        foreach (range(1, 50) as $index) {
            DB::table('articles')->insert([
                'author_id'   => $faker->randomElement($authorIds),
                'title'       => $faker->sentence(6),
                'cover_image' => null,
                'Category'    => $faker->randomElement($categories),
                'content'     => $faker->paragraphs(4, true),
                'status'      => $faker->randomElement(['Pending', 'Published']),
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}