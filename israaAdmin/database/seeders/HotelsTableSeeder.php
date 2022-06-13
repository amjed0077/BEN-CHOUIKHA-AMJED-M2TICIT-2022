<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hotels')->insert([
            'image' => Str::random(10).'.jpg',
            'name' => Str::random(10),
            'adresse' => Str::random(1),
            'description' => Str::random(20),
            'prix' => 50.0,
            'nbetoils' => Str::random(10),
        ]);
    }
}
