<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function getPage(){
        return view('newRent');
    }


    public function getType($type){
        
        if ($type == 'Berline' OR $type == 'S.U.V' OR $type == 'Utilitaire' OR $type == 'Break') {
             $vehicles = Vehicle::where('type', $type)->get();
             
             $countVehicles = $vehicles->count();
            return view('newRentByType')->with(['type'=> $type, 'vehicles'=>$vehicles, 'count'=>$countVehicles]);
        }else {
            return redirect()->action('RentController@getPage');
        }
    }

    public function getCar($id){
        $vehicle = Vehicle::where('id', $id)->get();
        return view('newRentByCar')->with(['vehicle', $vehicle]);
    }


    public function getAllRent(){
        return view('allRent');
    }

    public function getCurrentRent(){
        return view('currentRent');
    }
}
