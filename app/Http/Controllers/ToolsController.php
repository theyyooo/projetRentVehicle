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

        $request->validate([
            'mail'=> 'required|email:rfc',
            'password'=> 'required'
        ]);
        if (Auth::check() == false) {
            $mail = $request->get('mail');
            $mdpconnect = $request->get('password');
            if (!empty($mail) && !empty($mdpconnect)){
                Auth::attempt(['mail'=> $mail, 'password'=>$mdpconnect]);

                if (Auth::check() == true) {
                    return redirect()->action('ToolsController@main');
                }
                else {
                    $erreur = "mail ou mot de passe incorrect";
                    return view('connexion')->with('erreur', $erreur);
                }
            }
            else {
                return view('connexion');
            }
        }
        else {
            return redirect()->action('ToolsController@main');
        }
    }

    public function inscription(){
        if (Auth::check()) {
            return redirect()->action('ToolsController@main');
        }
        else {
            return view('inscription');
        }
    }

    public function inscriptionEx(Request $request){
        
        $request->validate([
            'nom'=> 'required|alpha',
            'prenom'=> 'required|alpha',
            'mail'=> 'required|email:rfc',
            'password1'=> 'required|min:5',
            'password2'=> 'same:password1'
        ]);

        $user = [
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'mail' => $request->input('mail'),
            'password' => Hash::make($request->input('password1'))    
        ];
        $password1 = $request->input('password1');
        $password2 = $request->input('password2');      
       
        if (!empty($user['nom']) AND !empty($user['prenom']) AND !empty($user['mail'])) {
            if (strlen($password1) >= 5) {
                if ($password1 == $password2) {
                    $oneUser = User::where('mail', $request->input('mail'))->get();
                    if(count($oneUser) == 0)
                    {
                        User::create($user);
                        Auth::attempt(['mail'=> $user['mail'], 'password'=>$password1]);
    
                        return redirect()->action('ToolsController@main');
                    }
                    else {
                        $erreur = "Ce mail existe déja";
                        return view('inscription')->with('erreur', $erreur);
                    }
                }
                else {
                    return view('inscription');
                }
            }
            else {
                return view('inscription');
            }
        }
        else {
            
            return view('inscription');
        }
    }

    public function deconnection(){
        Auth::logout();
        return redirect()->action('ToolsController@connexion');   
    }








    public function main(Request $request){
        if ($request->session()->has('alert_mp')) {
            $alert_success = $request->session()->get('alert_mp');
            return view('main')->with('alert_success', $alert_success);
            die(); 
        }
       
       return view('main'); 
    }









    public function admin(){
        if (Auth::check()) {
            if (Auth::user()->admin) {
                return view('admin');
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


