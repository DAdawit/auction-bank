<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'e-auctions',
            'email'=>'eauction@gmail.com',
            'bookNumber'=>10000,
            'balance'=>100000,
            'password'=>bcrypt('password')
        ]);
        DB::table('users')->insert([
            'name'=>'dawit',
            'email'=>'dawit@gmail.com',
            'bookNumber'=>10001,
            'balance'=>100000,
            'password'=>bcrypt('password')
        ]);
        DB::table('users')->insert([
            'name'=>'kasu',
            'email'=>'kasu@gmail.com',
            'bookNumber'=>10002,
            'balance'=>100000,
            'password'=>bcrypt('password')
        ]);
        DB::table('users')->insert([
            'name'=>'girma',
            'email'=>'girma@gmail.com',
            'bookNumber'=>10003,
            'balance'=>100000,
            'password'=>bcrypt('password')
        ]);
         DB::table('users')->insert([
            'name'=>'lala',
            'email'=>'lala@gmail.com',
            'bookNumber'=>10004,
            'balance'=>100000,
            'password'=>bcrypt('password')
        ]);
    }
}
