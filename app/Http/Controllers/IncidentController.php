<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Vehicle;
use Illuminate\Support\Facades\Auth;

class IncidentController extends Controller
{
    public function newincident(){
        if (Auth::check()) {
            if (Auth::user()->admin) {
                $voitures = Vehicle::all();
                return view('newincident')->with('voitures', $voitures);
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
        }
    }





    public function newincidentex(Request $request){
        $request->validate([
            'voiture'=> 'required',
            'Description'=> 'required',
            'Datecollision'=> 'required|before_or_equal:today',
            'Datereparation'=> 'required|after_or_equal:Datecollision'
        ]);
        if ($request->input('voiture') == "aucun"){
            $erreur = "merci de choisir un véhicule";
            $voitures = Vehicle::all();
            return view('newincident')->with(['erreur'=> $erreur, 'voitures' => $voitures]); 
        }
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
        if (Auth::check()) {
            if (Auth::user()->admin) {
                $incidents = Incident::where('created_at', '!=', null)->with('vehicle')->get();
                return view('allincident')->with('incidents', $incidents);
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
        }
    }

    public function editIncident($id){
        if (Auth::check()) {
            if (Auth::user()->admin) {
                $voitures = Vehicle::all();
                $incident = Incident::where('id', $id)->first();
                return view('editIncident')->with(['incident'=> $incident, 'voitures' => $voitures ]);
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
        }
    }

    public function editIncidentEx($id, Request $request){
        $request->validate([
            'voiture'=> 'required',
            'Description'=> 'required',
            'Datecollision'=> 'required|before_or_equal:today',
            'Datereparation'=> 'required|after_or_equal:Datecollision'
        ]);
        if ($request->input('voiture') == "aucun"){
            $erreur = "merci de choisir un véhicule";
            $voitures = Vehicle::all();
            $incident = Incident::where('id', $id)->first();
            return view('editIncident')->with(['erreur'=> $erreur, 'voitures' => $voitures, 'incident' => $incident]); 
        }
        $incident = [
            'vehicle_id'=> $request->input('voiture'),
            'description'=> $request->input('Description'),
            'date'=> $request->input('Datecollision'),
            'dateReparation'=> $request->input('Datereparation')
        ];
        Incident::where('id', $id)->first()->update($incident);

        $alert = "La modification sur un icident à été réalisé avec succès";
        $request->session()->flash('alert_mp', $alert);
        return redirect()->action('ToolsController@main');
    }

    public function delete($id, Request $request){

        if (Auth::check()) {
            if (Auth::user()->admin) {
                
                Incident::where('id', $id)->delete();

                $alert = 'Votre suppression sur un incident à été réalisé avec succès';
                $request->session()->flash('alert_mp', $alert);
                
                return redirect()->action('ToolsController@main');
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
        }
    }
}
