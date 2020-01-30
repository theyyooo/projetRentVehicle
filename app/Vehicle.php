<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['immatriculation', 'modele', 'marque', 'type', 'photo', 'disponibilite'];
   // public $timestamp = true;
}
