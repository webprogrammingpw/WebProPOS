<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            \App\Models\Order::create([
                'invoice' => $faker->unique()->randomNumber(9),
                'customer_id' => \App\Models\Customer::inRandomOrder()->first()->id,
                'user_id' => \App\Models\User::inRandomOrder()->first()->id,
                'total' => $faker->numberBetween(10000, 1000000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
