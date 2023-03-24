<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Áo sơ mi', 'slug' => 'Ao-so-mi', 'type' => 'top', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Áo thun', 'slug' => 'Ao-thun', 'type' => 'top', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Áo khoác', 'slug' => 'Ao-khoac', 'type' => 'top', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Hoodie', 'slug' => 'Hoodie', 'type' => 'top', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Sweater', 'slug' => 'Sweater', 'type' => 'top', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],

            ['name' => 'Quần thể thao', 'slug' => 'Quan-the-thao', 'type' => 'bottom', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Quần Jogger', 'slug' => 'Quan-jogger', 'type' => 'bottom', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Quần Jean', 'slug' => 'Quan-jean', 'type' => 'bottom', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Quần short', 'slug' => 'Quan-short', 'type' => 'bottom', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],

            ['name' => 'Balo', 'slug' => 'Balo', 'type' => 'accessory', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null],
            ['name' => 'Ví', 'slug' => 'Vi', 'type' => 'accessory', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => null]
        ]);
    }
}
