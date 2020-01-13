<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Rent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function getPage()
    {
        return view('newRent');
    }


    public function getType($type)
    {

        if ($type == 'Berline' or $type == 'S.U.V' or $type == 'Utilitaire' or $type == 'Break') {
            $vehicles = Vehicle::where('type', $type)->get();
            if (Auth::check() == true) {
                $loc = Auth::user()->vehicle;
                return view('newRentByType')->with(['type' => $type, 'vehicles' => $vehicles, 'erreur', 'loc' => $loc]);
            } else {
                return view('newRentByType')->with(['type' => $type, 'vehicles' => $vehicles, 'erreur']);
            }
        } else {
            return view('newRent');
        }
    }

    public function getCar($id)
    {
        if (Auth::check() == true) {
            $loc = Auth::user()->vehicle;
            $vehicle_id = $id;
            if ($loc == 0) {
                $vehicle = Vehicle::where('id', $id)->get();
                return view('newRentByCar')->with(['vehicle' => $vehicle, 'id' => $vehicle_id]);
            } else {
                return back();
            }
        } else {
            return redirect()->action('ToolsController@connexion');
        }
    }

    public function saveRent(Request $request)
    {
        $rent = [
            'user_id' => Auth::user()->id,
            'vehicle_id' => $request->input('id'),
            'dateDepart' => $request->input('datedebut'),
            'dateArrive' => $request->input('datefin')
        ];
        Rent::create($rent);

        $user = User::where('id', Auth::user()->id);
        $user->update(['vehicle' => 1]);
        return redirect()->action('ToolsController@main');
    }


    public function getAllRent()
    {
        if (Auth::check()==true) {
            $myRents = Rent::where('user_id', Auth::user()->id)->with('vehicle')->get();
            return view('allRent')->with(['myRents' => $myRents]);
        }
        else {
            return view('allRent');
        }
    }

    public function getCurrentRent()
    {
        if (Auth::check()==true) {
            $myRents = Rent::where('user_id', Auth::user()->id)->where('dateDepart', '<=', Carbon::now())->where('dateArrive', '>=', Carbon::now())->with('vehicle')->get();
            $date = Carbon::now();
            return view('currentRent')->with(['myRents' => $myRents, 'date' => $date]);
        }
        else {
            return view('currentRent');
        }
        
    }
}
