<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(
            [
                'name' => 'Nat2',
                'email' => 'natnt2@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '0987654321',
                'address' => 'Ha Noi',
                'birthday' => date('Y-m-d'),
                'avatar' => null,
                'description' => null,
                'status' => 1,
                'gender' => 0,
                'last_login' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
    }
}
