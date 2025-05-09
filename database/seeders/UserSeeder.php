<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Muhidin', 'email' => 'muhidin@abudata.com', 'password' => bcrypt('muhidin'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Muhidin Saimin', 'email' => 'muhidinsaimin@abudata.com', 'password' => bcrypt('muhidinsaimin'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'WebPro', 'email' => 'webpro@abudata.com', 'password' => bcrypt('webpro'), 'created_at' => now(), 'updated_at' => now()],
        ];
        User::insert($data);

    }
}
