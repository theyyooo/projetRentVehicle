<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PersonneController extends Controller
{
    public function getAllPersonne(){
        $users = User::all();
        return view('allPersonnes')->with('users', $users);
    }

    public function getPersonne($id){
        $user = User::where('id', $id)->first();
        return view('modifPersonne')->with('user', $user);
    }

    public function getPersonneEx($id, Request $request){
        if($request->input('location')){
            $loc = 1;
        }
        else {
            $loc = 0;
        }

        if($request->input('admin')){
            $admin = 1;
        }
        else {
            $admin = 0;
        }

        $personne = [
            'nom'=>htmlspecialchars($request->input('nom')),
            'prenom'=>htmlspecialchars($request->input('prenom')),
            'mail'=>htmlspecialchars($request->input('mail')),
            'vehicle'=>$loc,
            'admin'=>$admin

        ];

        User::where('id', $id)->first()->update($personne);
        $alert = 'Votre modidication sur un utilisateur à été réalisé avec succès';
        $request->session()->flash('alert_mp', $alert);
        return redirect()->action('ToolsController@main');
    }


    public function deletePersonne($id, Request $request){

        User::where('id', $id)->delete();

        $alert = 'Votre suppression sur un véhicule à été réalisé avec succès';
        $request->session()->flash('alert_mp', $alert);

        
        
        return redirect()->action('ToolsController@main');

    }
}
