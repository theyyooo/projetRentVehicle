<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnsForms extends Model
{
    protected $fillable = ['rent_id','dateDepart', 'dateArrive'];

    protected $table = 'returnsForms';
}
