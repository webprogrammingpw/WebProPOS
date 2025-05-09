<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $categories = \App\Models\Category::all();

        foreach ($categories as $category) {
            for ($i = 0; $i < 10; $i++) {
                \App\Models\Product::create([
                    'code' => $faker->unique()->randomNumber(9),
                    'name' => $faker->word,
                    'description' => $faker->sentence,
                    'price' => $faker->numberBetween(500, 100000),
                    'stock' => $faker->numberBetween(1, 100),
                    'category_id' => $category->id,
                    'image' => $faker->imageUrl(640, 480, 'technics'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
