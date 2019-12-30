<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['nom', 'password', 'prenom', 'anniversaire', 'adresse', 'ville', 'pays', 'codePostal', 'mail', 'tel'];
    public $timestamp = false;

}