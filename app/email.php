<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class email extends Model
{
    protected $table = "emails";
    protected $fillable = [
        'client_id', 
        'email', 
        'razon'
    ];
}
