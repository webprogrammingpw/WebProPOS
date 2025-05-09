<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Makanan', 'description' => 'Makanan ringan atau berat', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Minuman', 'description' => 'Berbagai jenis minuman', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kesehatan', 'description' => 'Produk kesehatan dan obat-obatan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Perawatan Pribadi', 'description' => 'Produk perawatan pribadi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Elektronik Rumah', 'description' => 'Peralatan elektronik untuk rumah', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Perabotan Rumah', 'description' => 'Perabotan untuk rumah tangga', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Aksesori Fashion', 'description' => 'Aksesori untuk fashion', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Buku', 'description' => 'Buku bacaan dan referensi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Alat Tulis', 'description' => 'Perlengkapan alat tulis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mainan', 'description' => 'Mainan anak-anak', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Peralatan Dapur', 'description' => 'Peralatan untuk memasak', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pakaian', 'description' => 'Pakaian pria, wanita, dan anak-anak', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kecantikan', 'description' => 'Produk kecantikan dan perawatan diri', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Olahraga', 'description' => 'Peralatan olahraga dan kebugaran', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Elektronik', 'description' => 'Perangkat elektronik dan gadget', 'created_at' => now(), 'updated_at' => now()],
        ];
        Category::insert($data);
    }
}
