<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;
use DateTime;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $hotels= DB::table('hotels')->get();
        
        // $hotels=array(
        //     array(
        //         "id" => 1,
        //         "name" => "Pack Aurum",
        //         "image" => "assets/images/img15.jpg",
        //         "description" => "5 Jours / 4 Nuitees",
        //         "prix" => 100,
        //          "nbetoils" => 5,
        //          "adresse" => "Djerba"
        //     ),
        //     array(
        //         "id" => 2,
        //         "name" => "Lost",
        //         "image" => "assets/images/img17.jpg",
        //         "description" => "6 Jours / 5 Nuitees",
        //         "prix" => 490,
        //          "nbetoils" => 100,
        //          "adresse" => "Djerba"
        //     ),
        //     array(
        //         "id" => 3,
        //         "name" => "Sunshine",
        //         "image" => "assets/images/img4.jpeg",
        //         "description" => "4 Jours / 3 Nuitees",
        //         "prix" => 58,
        //          "nbetoils" => 100,
        //          "adresse" => "Djerba"
        //     ),
        //     array(
        //         "id" => 4,
        //         "name" => "Nomade",
        //         "image" => "assets/images/img2.jpeg",
        //         "description" => "3 Jours / 2 Nuitees",
        //         "prix" => 69,
        //          "nbetoils" => 100,
        //          "adresse" => "Djerba"
        //     )
        //     );
      
        $data=array(
            "title"=>" Gestion Hotels",
           
            "hotels"=>$hotels
        );
        
        return view('backend.hotels.index',compact('data'));
    }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $file= $request->file('image');
    $filename= date('YmdHi').$file->getClientOriginalName();
    $file-> move(public_path('storage/hotels/'), $filename);
  
            DB::table('hotels')->insert(
                [ 'image' => $filename, 'name' => $request->input('name'),'prix' => $request->input('prix'),'description' => $request->input('description'),'nbetoils' => $request->input('nbetoils'),'adresse' =>$request->input('adresse')]);
  
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
       // dd($request->input('id'));
       
         $Hotel->name = $request->input('nameEdit');
         $Hotel->prix = $request->input('prixEdit');
         $Hotel->description = $request->input('descriptionEdit');
         $Hotel->nbetoils = $request->input('nbetoilsEdit');
         $Hotel->adresse = $request->input('adresseEdit');
        
       
         $Hotel->save();
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
        $hotel = Hotel::find($id);
        $hotel->delete();
        return redirect()->back();
    }

    public function update2(Request $request)
    {
        //
        $Hotel = Hotel::find($request->input('id'));
        //dd($request->input('hotelEdit'));
          $Hotel->name = $request->input('nameEdit');
          $Hotel->prix = $request->input('prixEdit');
          $Hotel->description = $request->input('descriptionEdit');
          $Hotel->nbetoils = $request->input('nbetoilsEdit');
          $Hotel->adresse = $request->input('adresseEdit');
         
         
         $Hotel->save();
         return redirect()->back()->with('success', 'Modifier avec succes !!');

        }
    }
