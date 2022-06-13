<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Facades\DB;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function voyages()
    {
        //
        //$voyages= DB::table('voyages')->get();
        $voyages = DB::select('select id,image,destination,nbjours,description,date,prix,hotel FROM voyages');
        return $voyages;
    }
    public function events()
    {
        //
        //$events= DB::table('events')->get();
        $events = DB::select('select id,image,name,type,date,prix,adresse FROM events');
        return $events;
    }
    public function circuits()
    {
        //
        //$circuits= DB::table('circuits')->get();
        $circuits = DB::select('select id,image,name,prix,description,nbjours,date FROM circuits');
        return $circuits;
    }
    public function hotels()
    {
        //
      ///  $hotels= DB::table('hotels')->get();
        $hotels = DB::select('select id,image,name,prix,description,nbetoils,adresse FROM hotels');
        return $hotels;
    }
 /**

     * login api.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
     // return($request->all());
     if(!empty($request->input('email')) && !empty($request->input('password')) ){
          /*  $users = DB::table('users')
                ->where('email', '=', $mail)
                ->get();*/
                 ///return($users);
                $res=User::where('email', '=', $request->input('email'))->exists();
                if($res){
                  $users = DB::table('users')
                  ->where('email', '=', $request->input('email'))
                  ->get();
                  if(password_verify($request->input('password'), $users[0]->password )){
                    return response()->json([
                      'success' => true,
                      'user' => $users
                    ]);
                  }
                      else{
                      return response()->json([
                        'success' => false,
                        'message' => 'Invalid Password',
                    ], 401);
                    }
                 }
                else{
                  return response()->json([
                    'success' => false,
                    'message' => 'Invalid Email and Password',
                ], 401);
                }
       }
          }
/**

     * Register api.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = new User;
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->password = bcrypt($request->input('password'));
        $data->save();
        return response()->json([
          'success' => true,
          'user' => $data
      ]);
    }
      //
      public function filtre($type,$date)
      {       
        
switch ($type) {
    case 'Circuit':
        $circuits = DB::select('select id,image,name,prix,description,nbjours,date FROM circuits where date > ?',[$date]);
        return $circuits;
        break;
    case 'Evenement':
        $events = DB::select('select id,image,name,type,date,prix,adresse FROM events where date > ?',[$date]);
        return $events;
        break;
    case 'Hotel':
        $hotels = DB::select('select id,image,name,prix,description,nbetoils,adresse FROM hotels');
        return $hotels;
        break;
    case 'Voyage':
        $voyages = DB::select('select id,image,destination,nbjours,description,date,prix,hotel FROM voyages where date > ?',[$date]);
        return $voyages;
        break;
}
       
      }

      public function ReservationsUser($id){
        $reservations = DB::select('select created_at,labelle_Service,labelle_Service,etat from rservations where rservations.user_id= ?',[$id]);
        return $reservations;

      }

}
