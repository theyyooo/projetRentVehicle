<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function connexion(){
        return view('connexion');
    }

    public function connexionEx(Request $request){
        $request->session->put('mail', $request['mail;']);
        return view('main');
    }

    public function inscription(){
        return view('inscription');
    }

    public function inscriptionEx(Request $request){
        var_dump($request);
    }

    public function main(){

       return view('main'); 
    }
}
