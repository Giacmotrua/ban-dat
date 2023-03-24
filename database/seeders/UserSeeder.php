<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Tan',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'phone' => '0987654321',
                'address' => 'Ha Noi',
                'image' => 'vxeCaZOC8N6H7rggFWeHEpiPLUMiZDev0ZcTOS5K.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
    }
}
