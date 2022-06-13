<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArrangementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('arrangement')->insert([
            'id_hotel' => 1,
            'arrangement_labelle' => 'LPD',
            'prix' => 50.0,
        ]);
    }
}
