<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $orders = \App\Models\Order::all();
        $products = \App\Models\Product::all();

        foreach ($orders as $order) {
            for ($i = 0; $i < 5; $i++) {
                \App\Models\OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $products->random()->id,
                    'quantity' => $faker->numberBetween(1, 10),
                    'price' => $faker->numberBetween(500, 100000),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
