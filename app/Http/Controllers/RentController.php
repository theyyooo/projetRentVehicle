<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentController extends Controller
{
    public function new(){
        return view('newRent');
    }

    public function getAllRent(){
        return view('allRent');
    }

    public function getCurrentRent(){
        return view('currentRent');
    }
}
