<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'fullname'=>'Muhamamd Haseeb',
            'username'=>'Haseeb',
            'email'=>'haseebishtiaq300@gmail.com',
            'password'=>Hash::make('111'),
            'role'=>'admin',
            'status'=>'active',
            ],
            [
                'fullname'=>'Ahmed Raza',
                'username'=>'Ahmed',
                'email'=>'ahmedraza@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'seller',
                'status'=>'active',
            ],
            [
                'fullname'=>'Ali Rehman',
                'username'=>'Ali',
                'email'=>'ali@gmail.com',
                'password'=>Hash::make('11111'),
                'role'=>'customer',
                'status'=>'active',
            ],
        ]);
    }
}
