<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rservations')->insert([
            'service_id' => '1',
            'labelle_Service' => 'Hotels',
            'user_id' => '2',
            'etat'=>"1"
        ]);
        DB::table('rservations')->insert([
            'service_id' => '2',
            'labelle_Service' => 'Hotels',
            'user_id' => '8',
            'etat'=>"1"
        ]);
        DB::table('rservations')->insert([
            'service_id' => '1',
            'labelle_Service' => 'circuit',
            'user_id' => '2','etat'=>"1"
        ]);
        DB::table('rservations')->insert([
            'service_id' => '1',
            'labelle_Service' => 'circuit',
            'user_id' => '3','etat'=>"1"
        ]);
        DB::table('rservations')->insert([
            'service_id' => '1',
            'labelle_Service' => 'circuit',
            'user_id' => '4','etat'=>"1"
        ]);
        DB::table('rservations')->insert([
            'service_id' => '1',
            'labelle_Service' => 'hotels',
            'user_id' => '5','etat'=>"1"
        ]);
        
    }
}
