<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentController extends Controller
{
    public function getPage(){
        return view('newRent');
    }

    public function getSUV(){

        $type = 'S.U.V';
        return view('newRentByType')->with('type', $type);

    }

    public function getBERLINE(){
        $type = 'Berline';
        return view('newRentByType')->with('type', $type);
    }

    public function getUTILITAIRE(){
        $type = 'Utilitaire';
        return view('newRentByType')->with('type', $type);
    }

    public function getBREAK(){
        $type = 'Break';
        return view('newRentByType')->with('type', $type);
    }

    public function getAllRent(){
        return view('allRent');
    }

    public function getCurrentRent(){
        return view('currentRent');
    }
}
