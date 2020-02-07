<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Vehicle;

class IncidentController extends Controller
{
    public function newincident(){
        $voitures = Vehicle::all();
        return view('newincident')->with('voitures', $voitures);
    }





    public function newincidentex(Request $request){
            $incident = [
                'vehicle_id'=> $request->input('voiture'),
                'description'=> $request->input('Description'),
                'date'=> $request->input('Datecollision'),
                'dateReparation'=> $request->input('Datereparation')
            ];
        Incident::create($incident);

        $alert = "Le nouveau incident à été ajouté avec succès";
        $request->session()->flash('alert_mp', $alert);
        return redirect()->action('ToolsController@main');
        
    }


    public function getallincident(){
        $incidents = Incident::where('created_at', '!=', null)->with('vehicle')->get();
        return view('allincident')->with('incidents', $incidents);
    }
}
