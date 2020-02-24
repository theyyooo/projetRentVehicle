<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;


class VehicleController extends Controller
{
    public function newVehicle(){
        if (Auth::check()) {
            if (Auth::user()->admin) {
                return view('newVehicle');
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
        }
    }
 
    public function newVehicleEx(Request $request){
        $request->validate([
            'Immatriculation'=> 'required|size:9',
            'Marque'=> 'required',
            'Modele'=> 'required',
            'Type'=> 'required',
            'image'=> 'required|image'
        ]);

        $type = ['', 'Berline', 'Break', 'S.U.V', 'Utilitaire'];
        $dispo = $request->input('dispo');
        if ($dispo == 'on') {
            $disponibilite = true;
        }
        else {
            $disponibilite = false;
        }

        if ($request->input('Type') == 0){
            $erreur = "merci de remplir tous les champs";
            return view('newVehicle')->with('erreur', $erreur);  
        }
        $vehicle = [
            'immatriculation' => ($request->input('Immatriculation')),
            'marque' => ($request->input('Marque')),
            'modele' => ($request->input('Modele')),
            'type' => $type[$request->input('Type')],
            'photo'=> ($request->input('Modele')),
            'disponibilite'=> $disponibilite
        ];

        Vehicle::create($vehicle);

       
       if ($request->hasFile('image')) {
            $path = $request->image->storeAs('public/uploads', $vehicle['photo'].'.jpg');
       }
       $alert = "Le nouveau véhicule à été ajouté avec succès";
       $request->session()->flash('alert_mp', $alert);
       return redirect()->action('ToolsController@main');
    }

    public function getAllVehicle(){
        if (Auth::check()) {
            if (Auth::user()->admin) {
                $vehicles = Vehicle::all();
                return view('allVehicle')->with('vehicles', $vehicles);
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
        }
    }

    public function getVehicle($id){
        if (Auth::check()) {
            if (Auth::user()->admin) {
                $unVehicle = Vehicle::where('id', $id)->first();
                if ($unVehicle != null) {
                    return view('modifVehicle')->with('unvehicle', $unVehicle);
                }
                else {
                    return redirect()->action('ToolsController@main');  
                }
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
        }
    }

    public function edit($id, Request $request){
        $request->validate([
            'Immatriculation'=> 'required|size:9',
            'Marque'=> 'required',
            'Modele'=> 'required',
            'Type'=> 'required'
        ]);
        $type = ['', 'Berline', 'Break', 'S.U.V', 'Utilitaire'];
        $dispo = $request->input('dispo');
        if ($request->input('Type') == 0){
            $erreur = "merci de remplir tous les champs";
            $unVehicle = Vehicle::where('id', $id)->first();
            return view('modifVehicle')->with(['erreur'=> $erreur, 'unvehicle'=>$unVehicle]);  
        }
        else {
            if ($dispo == 'on') {
                $disponibilite = true;
            }
            else {
                $disponibilite = false;
            }
            $vehicle = [
                'immatriculation' => ($request->input('Immatriculation')),
                'marque' => ($request->input('Marque')),
                'modele' => ($request->input('Modele')),
                'type' => $type[$request->input('Type')],
                'photo'=> ($request->input('Modele')),
                'disponibilite'=> $disponibilite
            ];
    
            Vehicle::where('id', $id)->first()->Update($vehicle);
    
            $alert = 'Votre modidication sur un véhicule à été réalisé avec succès';
            $request->session()->flash('alert_mp', $alert);
            return redirect()->action('ToolsController@main');
        }
       
    }

    public function delete($id, Request $request){
        if (Auth::check()) {
            if (Auth::user()->admin) {
                $alert = 'Votre suppression sur un véhicule à été réalisé avec succès';
                $request->session()->flash('alert_mp', $alert);
                Vehicle::where('id', $id)->delete();
                
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
    