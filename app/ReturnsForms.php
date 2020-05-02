<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnsForms extends Model
{
    protected $fillable = ['rent_id','date_depart', 'date_arrive'];

    protected $table = 'returns_forms';
}
