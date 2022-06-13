<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\arrangement;

class ArrangmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $arrangements= arrangement::with('hotel')->get();
        $hotels= DB::table('hotels')->get();
        $data=array(
            "title"=>" Gestion Arrangement",
            "hotels"=>$hotels,
            "arrangements"=>$arrangements
        );
        
        return view('backend.arrangement.index',compact('data'));

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
        $data = new arrangement;
        $data->hotel_id = $request->input('id_hotel');
        $data->arrangement_labelle = $request->input('arrangement_labelle');
        $data->prix = $request->input('prix');
       
        $data->save();
        return redirect()->back()->with('success', 'ajouter avec succes !!');  
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
        $arrangement= arrangement::find($id);
        $arrangement->delete();
     
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getArrangment($id)
    {
        //
        $arrangement= DB::select('select arrangement_labelle,prix FROM arrangements WHERE hotel_id=?',[$id]);
     
        return $arrangement;
    }

       /**
     * Update the specified resource in stor0age.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request)
    {
        //
     
        $arrangement= arrangement::find($request->input('id'));
        dd($request['id']);
          $arrangement->prix = $request->input('prixEdit');
         $arrangement->save();
         return redirect()->back()->with('success', 'Modifier avec succes !!');
    }
    
}
