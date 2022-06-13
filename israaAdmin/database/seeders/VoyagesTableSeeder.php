<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VoyagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('voyages')->insert([
            'image' => Str::random(10).'.jpg',
            'destination' => Str::random(10),
            'nbjours' => Str::random(1),
            'description' => Str::random(20),
            'date' => Carbon::parse('2000-01-01'),
            'prix' => 50.0,
            'hotel' => Str::random(10),
        ]);
    }
}
