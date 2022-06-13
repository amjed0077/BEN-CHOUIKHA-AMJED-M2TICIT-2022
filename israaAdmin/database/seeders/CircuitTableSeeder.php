<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CircuitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('circuits')->insert([
            'image' => Str::random(10).'.jpg',
            'name' => Str::random(10),
            'date' => Carbon::parse('2000-01-01'),
            'description' => Str::random(20),
            'prix' => 50.0,
            'nbjours' => Str::random(10),
        ]);
    }
}
