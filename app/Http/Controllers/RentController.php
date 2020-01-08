<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function getPage(){
        return view('newRent');
    }


    public function getType($type){
        
        if ($type == 'Berline' OR $type == 'S.U.V' OR $type == 'Utilitaire' OR $type == 'Break') {
             $vehicles = Vehicle::where('type', $type)->get();
             $loc = Auth::user()->vehicle;
            return view('newRentByType')->with(['type'=> $type, 'vehicles'=>$vehicles, 'erreur', 'loc'=>$loc]);
        }else {
            return view('newRent');
        }
    }

    public function getCar($id){
        if (Auth::check() == true) {
            $loc = Auth::user()->vehicle;
            if ($loc == 0) {
                $vehicle = Vehicle::where('id', $id)->get();
               
                return view('newRentByCar')->with(['vehicle'=>$vehicle]);
            }
            else {
                return back();
            }
            
        }
        else {
            return redirect()->action('ToolsController@connexion');
        }
        
    }


    public function getAllRent(){
        return view('allRent');
    }

    public function getCurrentRent(){
        return view('currentRent');
    }
}
