<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function newVehicle(){
        return view('newVehicle');
    }

    public function newVehicleEx(Request $request){

        $type = ['', 'Berline', 'Break', 'SUV', 'Utilitaire'];
        $vehicle = [
            'immatriculation' => htmlspecialchars($request->input('Immatriculation')),
            'marque' => htmlspecialchars($request->input('Marque')),
            'modele' => htmlspecialchars($request->input('Modele')),
            'type' => $type[$request->input('Type')]
        ];
       // dd($vehicle);
       //$request->image->storeAs('image', '')

        return view('admin');
    }

    public function getAllVehicle(){

    }

    public function getVehicle($id){

    }

    public function edit($id){

    }

    public function delete($id){
        
    }
}
