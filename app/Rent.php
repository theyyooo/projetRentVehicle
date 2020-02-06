<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = ['vehicle_id', 'user_id', 'returnsForms_id',  'dateDepart', 'dateArrive'];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function returnForm(){
        return $this->belongsTo(ReturnsForms::class, 'returnsForms_id');
    }
}
