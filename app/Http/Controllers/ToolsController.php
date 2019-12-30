<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class ToolsController extends Controller
{
    public function connexion(){
        return view('connexion');
    }

    public function connexionEx(Request $request){
        
        $mail = htmlspecialchars($request->get('mail'));
        $mdpconnect = ($request->get('password'));
        if (!empty($mail) AND !empty($mdpconnect)){
           return view('main');
        }
        else {
            $erreur = 'Veuillez remplir tous les champs';
            return view('connexion')->with('erreur', $erreur);
        }
    }

    public function inscription(){
        return view('inscription');
    }

    public function inscriptionEx(Request $request){
     
        $user = [
            //'UserId' => '00001',
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'anniversaire' => $request->input('anniversaire'),
            'adresse' => $request->input('adresse'),
            'ville' => $request->input('ville'),
            'pays' => $request->input('pays'),
            'codePostal' => $request->input('cp'),
            'mail' => $request->input('mail'),
            'tel' => $request->input('tel'),
            'password' => Hash::make($request->input('password'))
        ];

        if (!empty('nom') AND !empty('nom') AND !empty('nom') AND !empty('nom') AND !empty('nom') AND !empty('nom') AND !empty('nom') AND !empty('nom') ) {

            User::create($user);
            $data = $request->get('prenom');
            $request->session()->put('prenom', $data);
            return view('main')->with('prenom', $data);
        }
        else {
            $erreur = 'Veuillez remplir tous les champs';
            return view('inscription')->with('erreur', $erreur);
        }



    }

    public function main(){

       return view('main'); 
    }
}
