<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use DateTime;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events= DB::table('events')->get();
        $data=array(
            "title"=>" Gestion Evenement",
           
            "events"=>$events
        );
        
        return view('backend.event.index',compact('data'));
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
        $file-> move(public_path('storage/events/'), $filename);
      
        DB::table('events')->insert(
            [ 'image' => $filename, 'name' => $request->input('name'),'prix' => $request->input('prix'),'adresse' => $request->input('adresse'),'type' => $request->input('event_id'),'date' => $request->input('date')]);

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
        $Event->name = $request->input('nameEdit');
        $Event->prix = $request->input('prixEdit');
        $Event->adresse = $request->input('adresse');
        $Event->type = $request->input('typeEdit');
        $Event->date = $request->input('dateEdit');
       
      
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
        $event = Event::find($id);
        $event->delete();
        return redirect()->back();
    }

    public function update2(Request $request)
    {
        //
          $Event = Event::find($request->input('id'));
          $Event->name = $request->input('nameEdit');
          $Event->prix = $request->input('prixEdit');
          $Event->adresse = $request->input('adresseEdit');
          $Event->type = $request->input('event_idEdit');
          $Event->date = $request->input('dateEdit');
         
         
         $Event->save();
         return redirect()->back()->with('success', 'Modifier avec succes !!');

        }
}
