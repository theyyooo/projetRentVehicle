<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ToolsController extends Controller
{
    public function connexion(){
        return view('connexion');
    }

    public function connexionEx(Request $request){
        if (Auth::check() == false) {
            $mail = htmlspecialchars($request->get('mail'));
            $mdpconnect = ($request->get('password'));
            if (!empty($mail) AND !empty($mdpconnect)){
                Auth::attempt(['mail'=> $mail, 'password'=>$mdpconnect]);
            if (Auth::check() == true) {
                return view('main');
             }
             else {
                 $erreur = 'Le mot de passe ou le mail est incorrecte';
                 return view('connexion')->with('erreur', $erreur);
             }
              return view('main');
            }
            else {
                $erreur = 'Veuillez remplir tous les champs';
                return view('connexion')->with('erreur', $erreur);
            }
        }
        else {
            echo('deja connecté');
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

    public function deconnection(){
        Auth::logout();
        return view('main');    
    }

    public function main(){

       return view('main'); 
    }
}
