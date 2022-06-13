<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'amjed@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'User1@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'User3@gmail.com',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'User4@gmail.com',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'User5@gmail.com',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'User6@gmail.com',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'User7@gmail.com',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'User8@gmail.com',
            'password' => bcrypt('secret')
        ]);
    }
}
