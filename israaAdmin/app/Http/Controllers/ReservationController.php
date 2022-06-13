<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reservations= Rservation::with('user')->get();
        $users= DB::table('users')->get();
        $data=array(
            "title"=>" Gestion Reservations",
            "users"=>$users,
            "reservations"=>$reservations
        );
        
        return view('backend.reservations.index',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = new Rservation;
        $data->prenom = $request->input('prenom');
        $data->nom = $request->input('nom');
        $data->portable = $request->input('portable');
        $data->adresse = $request->input('adresse');
        $data->labelle_service = $request->input('labelle_service');
        $data->service_id = $request->input('service_id');
        $data->nb_pax = $request->input('nb_pax');
        $data->user_id = $request->input('user_id');
        $data->save();
        return response()->json([
          'success' => true,
          'reservation' => $data
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Reservation = Rservation::find($id);
        $Reservation->delete();
        return redirect()->back();
    }


    ///////

    public function Confirmer($id)
    {
        //
        $affected = DB::table('rservations')
        ->where('id', $id)
        ->update(['etat' => '2']);
        return redirect()->back();
    }

     ///////

     public function annuler($id)
     {
         //
         $affected = DB::table('rservations')
         ->where('id', $id)
         ->update(['etat' => '0']);
         return redirect()->back();
     }
}
