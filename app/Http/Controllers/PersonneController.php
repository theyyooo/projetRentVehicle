<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class PersonneController extends Controller
{
    public function getAllPersonne(){

        if (Auth::check()) {
            if (Auth::user()->admin) {

                $users = User::all();
                return view('allPersonnes')->with(compact('users'));
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
        }
    }

    public function getPersonne($id){

        if (Auth::check()) {
            if (Auth::user()->admin) {
                
                $user = User::find($id);
                if ($user == null) {
                    return redirect()->action('ToolsController@main');  
                }
                else {
                    return view('modifPersonne')->with('user', $user);
                }
            }
            else {
                return redirect()->action('ToolsController@main');   
            }
        }
        else {
            return redirect()->action('ToolsController@main');   
        }
    }

    public function getPersonneEx($id, Request $request){

        $request->validate([
            'nom'=> 'required|alpha',
            'prenom'=> 'required|alpha',
            'mail'=> 'required|email:rfc',
            'location'=> '',
            'admin'=> ''
        ]);

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
            'nom'=>$request->input('nom'),
            'prenom'=>$request->input('prenom'),
            'mail'=>$request->input('mail'),
            'vehicle'=>$loc,
            'admin'=>$admin

        ];

        User::find($id)->update($personne);
        $alert = 'Votre modidication sur un utilisateur à été réalisé avec succès';
        $request->session()->flash('alert_mp', $alert);
        return redirect()->action('ToolsController@main');
    }

    public function deletePersonne($id, Request $request){

        if (Auth::check()) {
            if (Auth::user()->admin) {
                
                User::where('id', $id)->delete();

                $alert = 'Votre suppression sur un véhicule à été réalisé avec succès';
                $request->session()->flash('alert_mp', $alert);
                
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
