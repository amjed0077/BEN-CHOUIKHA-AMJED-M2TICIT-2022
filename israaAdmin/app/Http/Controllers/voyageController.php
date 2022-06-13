<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Voyage;
use DateTime;

class voyageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
                $voyages= DB::table('voyages')->get();
/*
                $voyages=array(
                    array(
                        "id" => 1,
                        "destination" => "Pack Aurum",
                        "image" => "assets/images/img15.jpg",
                        "nbjours" => "7 jours",
                        "description" => "5 Jours / 4 Nuitees",
                        "prix" => 100,
                        "date" => "1/1/2001"
                    ),
                    array(
                        "id" => 2,
                        "destination" => "Pack Aurum",
                        "image" => "assets/images/img15.jpg",
                        "nbjours" => "7 jours",
                        "description" => "5 Jours / 4 Nuitees",
                        "prix" => 100,
                        "date" => "1/1/2001"
                    ),
                    array(
                        "id" => 3,
                        "destination" => "Pack Aurum",
                        "image" => "assets/images/img15.jpg",
                        "nbjours" => "7 jours",
                        "description" => "5 Jours / 4 Nuitees",
                        "prix" => 100,
                        "date" => "1/1/2001"
                    )
                    );*/
                    $hotels= DB::table('hotels')->get();

                $data=array(
                    "title"=>" Gestion voyages",
                    "hotels"=>$hotels,
                    "voyages"=>$voyages
                );
                
                return view('backend.voyages.index',compact('data'));
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
        //dd("hi");
        
        $now = new DateTime();
        $res =  $request->validate([
        'date' => 'date|required|after:'.$now->format('Y-m-d'),
    ]);
    $file= $request->file('image');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('storage/voyages/'), $filename);
            DB::table('voyages')->insert(
                [ 'image' => $filename, 'destination' => $request->input('destination'),'prix' => $request->input('prix'),'nbjours' => $request->input('nbjours'),'description' => $request->input('description'),'date' =>$request->input('date'),'hotel'=>$request->input('id_hotel')]);
  
                

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
     * Update the specified resource in stor0age.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       // $Voyage = Voyage::find($request->input('id'));
        //dd($request->input('id'));
       
        $Voyage->destination = $request->input('destinationEdit');
         $Voyage->nbjours = $request->input('nbjoursEdit');
         $Voyage->description = $request->input('descriptionEdit');
         $Voyage->date = $request->input('dateEdit');
         $Voyage->prix = $request->input('prixEdit');
         $Voyage->hotel = $request->input('hotel_idEdit');
       
         $Voyage->save();
         return redirect()->back()->with('success', 'Modifier avec succes !!');
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
        $voyage = Voyage::find($id);
        $voyage->delete();
        return redirect()->back();
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
        $Voyage = Voyage::find($request->input('id'));
        //dd($request->input('hotelEdit'));
          $Voyage->destination = $request->input('destinationEdit');
         $Voyage->nbjours = $request->input('nbjoursEdit');
         $Voyage->description = $request->input('descriptionEdit');
         $Voyage->date = $request->input('dateEdit');
         $Voyage->prix = $request->input('prixEdit');
        $Voyage->hotel = $request->input('hotel_idEdit');
       
         $Voyage->save();
         return redirect()->back()->with('success', 'Modifier avec succes !!');
    }

}
