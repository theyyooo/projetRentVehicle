<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = ['vehicle_id', 'user_id', 'returns_forms_id',  'date_depart', 'date_arrive'];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function returnForm(){
        return $this->belongsTo(ReturnsForms::class, 'returns_forms_id');
    }
}
