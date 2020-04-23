<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable = ['vehicle_id', 'description', 'date', 'dateReparation'];
    protected $table = 'incidents'; 

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
}
