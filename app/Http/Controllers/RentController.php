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
            return redirect()->action('RentController@getPage');
        }
    }

    public function getCar($id)
    {
        if (Auth::check() == true) {
            $loc = Auth::user()->vehicle;
            $vehicle_id = $id;
            if ($loc == 0) {
                $vehicle = Vehicle::where('id', $id)->where('disponibilite', 1)->get();
                if (count($vehicle) == 0) {
                    return redirect()->action('RentController@getPage');
                }
                else{

                return view('newRentByCar')->with(['vehicle' => $vehicle, 'id' => $vehicle_id]);                  
                }

            } else {
                return back();
            } 
        } else {
            return redirect()->action('ToolsController@connexion');
        }
    }

    public function saveRent(Request $request)
    {
        $request->validate([
            'dateDepart'=> 'required|date|after_or_equal: today',
            'dateArrive'=> 'required|date|after_or_equal:dateDepart'
        ]);

        $rent = [
            'user_id' => Auth::user()->id,
            'vehicle_id' => $request->input('id'),
            'dateDepart' => $request->input('dateDepart'),
            'dateArrive' => $request->input('dateArrive')
        ];
        Rent::create($rent);

        $user = User::where('id', Auth::user()->id);
        $user->update(['vehicle' => 1]);
        $alert = "Votre réservation à été pris en compte. Toutefois, les dates de réservation sont succeptible d'\être modifier";
        $request->session()->flash('alert_mp', $alert);
        return redirect()->action('ToolsController@main');
    }


    public function getAllRent()
    {
        if (Auth::check()==true) {
            $myRents = Rent::where('user_id', Auth::user()->id)->with('vehicle')->get();
            return view('allRent')->with(['myRents' => $myRents]);
        }
        else {
            return redirect()->action('ToolsController@connexion');
        }
    }

    public function getRent(){

        if (Auth::check()) {
            if (Auth::user()->admin) {
                
                $rents = Rent::where('created_at', '!=', null)->with('vehicle', 'user')->get();
                return view('rent')->with(['rents'=> $rents]);
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
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
            return redirect()->action('ToolsController@connexion');
        }
        
    }
 


    public function delete($id, Request $request){

        if (Auth::check()) {
            if (Auth::user()->admin) {
                
                $alert = 'Votre suppression sur une location à été réalisée avec succès';
                $request->session()->flash('alert_mp', $alert);
                $rent = Rent::where('id', $id)->with('user')->first();
                
                $user = [
                   'nom'=> $rent->user->nom,
                   'prenom'=> $rent->user->prenom,
                   'mail'=> $rent->user->mail,
                   'vehicle'=> 0,
                   'admin'=> $rent->user->admin
                ];
                User::where('id', $rent->vehicle_id)->first()->update($user);
        
                Rent::where('id', $id)->delete();
        
                
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
