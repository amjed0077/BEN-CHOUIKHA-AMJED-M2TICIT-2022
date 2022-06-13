<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    ///// get
    public function statisque()
    {
        //
$users = DB::table('users')->count();
$hotels = DB::table('hotels')->count();
$circuits = DB::table('circuits')->count();
$events = DB::table('events')->count();
$voyages = DB::table('voyages')->count();
$reservations = DB::table('rservations')->count();
// $somme=DB::table('paiements')->sum('montant');
$data=array(
    "users"=>$users,
   "hotels"=>$hotels,
    "circuits"=>$circuits,
    "events"=>$events,
    "voyages"=>$voyages,
    "reservations"=>$reservations,
    
    // "somme"=>$somme,
);
// return $data;
      return view('backend.index',compact('data'));  


    }
  }
