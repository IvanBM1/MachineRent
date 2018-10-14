<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    protected $table = "phones";
    protected $fillable = [
        'client_id', 
        'number', 
        'razon'
    ];
}
