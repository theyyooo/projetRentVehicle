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
        $type = ['', 'Berline', 'Break', 'SUV', 'Utilitaire'];
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
        

        return view('admin');
    }

    public function getAllVehicle(){
        $vehicles = Vehicle::all();
        return view('allVehicle')->with('vehicles', $vehicles);
    }

    public function getVehicle($id){
        $unVehicle = Vehicle::where('id', $id)->first();
        return view('modifVehicle')->with('unvehicle', $unVehicle);
    }

    public function edit($id){

    }

    public function delete($id){
        
    }
}
