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
        if (Auth::check()==true) {
            return redirect()->action('ToolsController@main');
        }
        else {
            return view('connexion');
        }
        
    }

    public function connexionEx(Request $request){
        if (Auth::check() == false) {
            $mail = htmlspecialchars($request->get('mail'));
            $mdpconnect = htmlspecialchars($request->get('password'));
            if (!empty($mail) AND !empty($mdpconnect)){
                Auth::attempt(['mail'=> $mail, 'password'=>$mdpconnect]);
            if (Auth::check() == true) {
                return redirect()->action('ToolsController@main');
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
            return redirect()->action('ToolsController@main');
        }
    }

    public function inscription(){
        if (Auth::check()==true) {
            return redirect()->action('ToolsController@main');
        }
        else {
            return view('inscription');
        }
    }

    public function inscriptionEx(Request $request){
     
        $user = [
            //'UserId' => '00001',
            'nom' => htmlspecialchars($request->input('nom')),
            'prenom' => htmlspecialchars($request->input('prenom')),
            'mail' => htmlspecialchars($request->input('mail')),
            'password' => Hash::make($request->input('password1'))    
        ];
        $password1 = htmlspecialchars($request->input('password1'));
        $password2 = htmlspecialchars($request->input('password2'));      
       
        if (!empty('nom') AND !empty('prenom') AND !empty('anniversaire') AND !empty('adresse') AND !empty('ville') AND !empty('pays') AND !empty('codePostal') AND !empty('mail')AND !empty('tel') ) {
            if (strlen($password1) > 5) {
                if ($password1 == $password2) {
                    User::create($user);
                    Auth::attempt(['mail'=> $user['mail'], 'password'=>$password1]);

                    return redirect()->action('ToolsController@main');
                }
                else {
                    $erreur = 'Les mots de passe ne correspondent pas';
                    return view('inscription')->with('erreur', $erreur);
                }
            }
            else {
                $erreur = 'Choisissez un meilleur mot de passe';
                return view('inscription')->with('erreur', $erreur);
            }
        }
        else {
            $erreur = 'Veuillez remplir tous les champs';
            return view('inscription')->with('erreur', $erreur);
        }
    }

    public function deconnection(){
        Auth::logout();
        return redirect()->action('ToolsController@connexion');   
    }

    public function main(){

       return view('main'); 
    }

    public function admin(){
        if (Auth::check()) {
            if (Auth::user()->admin) {
                return view('admin');
            }
            else {
                return view('404');
            }
        }
        else {
            return view('404');
        }
        
    }
}


