<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;


class VehicleController extends Controller
{
    public function newVehicle(){
        return view('newVehicle');
    }
 
    public function newVehicleEx(Request $request){
        $type = ['', 'Berline', 'Break', 'S.U.V', 'Utilitaire'];
        $dispo = $request->input('dispo');
        if ($dispo == 'on') {
            $disponibilite = true;
        }
        else {
            $disponibilite = false;
        }
        $vehicle = [
            'immatriculation' => htmlspecialchars($request->input('Immatriculation')),
            'marque' => htmlspecialchars($request->input('Marque')),
            'modele' => htmlspecialchars($request->input('Modele')),
            'type' => $type[$request->input('Type')],
            'photo'=> htmlspecialchars($request->input('Modele')),
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
        $vehicles = Vehicle::all();
        return view('allVehicle')->with('vehicles', $vehicles);
    }

    public function getVehicle($id){
        $unVehicle = Vehicle::where('id', $id)->first();
        return view('modifVehicle')->with('unvehicle', $unVehicle);
    }

    public function edit($id, Request $request){
        
        if(($request->input('Type')!=0) AND ($request->input('Immatriculation')) AND ($request->input('Marque')) AND ($request->input('Modele')))
        {
                $type = ['', 'Berline', 'Break', 'S.U.V', 'Utilitaire'];
                $dispo = $request->input('dispo');
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
        else {
            $erreur = "merci de remplir tous les champs";
            $unVehicle = Vehicle::where('id', $id)->first();
            return view('modifVehicle')->with(['erreur'=> $erreur, 'unvehicle'=>$unVehicle]);
        }
        
    }

    public function delete($id, Request $request){
        $alert = 'Votre suppression sur un véhicule à été réalisé avec succès';
        $request->session()->flash('alert_mp', $alert);
        Vehicle::where('id', $id)->delete();
        
        return redirect()->action('ToolsController@main');
    }
}
    