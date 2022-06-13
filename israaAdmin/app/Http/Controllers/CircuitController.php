<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Circuit;
use DateTime;

class CircuitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $circuits= DB::table('circuits')->get();
        $data=array(
            "title"=>" Gestion Circuits",
           
            "circuits"=>$circuits
        );
        
        return view('backend.circuit.index',compact('data'));
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
       // dd($request->input('image'));
       $file= $request->file('image');
       $filename= date('YmdHi').$file->getClientOriginalName();
       $file-> move(public_path('storage/circuits/'), $filename);
        DB::table('circuits')->insert(
            [ 'image' => $filename, 'name' => $request->input('name'),'prix' => $request->input('prix'),'description' => $request->input('description'),'nbjours' => $request->input('nbjours'),'date' => $request->input('date')]);

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
       
        $Circuit->name = $request->input('nameEdit');
        $Circuit->prix = $request->input('prixEdit');
        $Circuit->description = $request->input('descriptionEdit');
        $Circuit->nbjours = $request->input('nbjoursEdit');
        $Circuit->date = $request->input('dateEdit');
       
      
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
        $circuit = Circuit::find($id);
        $circuit->delete();
        return redirect()->back();
    }
    public function update2(Request $request)
    {
        //
        $Circuit = Circuit::find($request->input('id'));
          $Circuit->name = $request->input('nameEdit');
          $Circuit->prix = $request->input('prixEdit');
          $Circuit->description = $request->input('descriptionEdit');
          $Circuit->nbjours = $request->input('nbjoursEdit');
          $Circuit->date = $request->input('dateEdit');
         
         
         $Circuit->save();
         return redirect()->back()->with('success', 'Modifier avec succes !!');

        }
}
