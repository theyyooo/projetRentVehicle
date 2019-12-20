<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ToolsController extends Controller
{
    public function connexion(){
        return view('connexion');
    }

    public function connexionEx(Request $request){
        
        
        $data = $request->get('mail');
        $request->session()->put('mail', $data);
        return view('main')->with('mail', $data);
    }

    public function inscription(){
        return view('inscription');
    }

    public function inscriptionEx(Request $request){
     
        $user = [
            'UserNom' => $request->input('nom'),
            'UserPrenom' => $request->input('prenom'),
            'UserAnniversaire' => $request->input('anniversaire'),
            'UserAdresse' => $request->input('adresse'),
            'UserVille' => $request->input('ville'),
            'UserPays' => $request->input('pays'),
            'UserCodePostal' => $request->input('cp'),
            'UserMail' => $request->input('mail'),
            'Usertel' => $request->input('tel')
        ];

        User::create($user);

        $data = $request->get('prenom');
        $request->session()->put('prenom', $data);
        return view('main')->with('prenom', $data);

    }

    public function main(){

       return view('main'); 
    }
}
