<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table = "addresses";
    protected $fillable = [
        'client_id', 
        'street', 
        'numberint', 
        'numberext',
        'colony',
        'state',
        'municipality',
        'cp',
        'rfc',
        'razon',
        'fiscal',
        'betweenstreet1',
        'betweenstreet2',
        'references'
    ];
}
