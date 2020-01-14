<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthentiticatable;



class User extends Model implements Authenticatable
{
    use BasicAuthentiticatable;
    protected $fillable = ['nom', 'password', 'prenom', 'mail', 'vehicle'];
    public $timestamp = false;


    public function locations(){
        return $this->hasMany(Rent::class);
    }
}
