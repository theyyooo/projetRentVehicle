<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['immatriculation', 'model', 'marque', 'type', 'disponibilite'];
   // public $timestamp = true;
}
