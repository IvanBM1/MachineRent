<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rent extends Model
{
    protected $table = "rents";
    protected $fillable = [
        'client_id', 
        'employee_id', 
        'address_id', 
        'total', 
        'extracost',
        'discount',
        'payment',
        'iva',
        'bill',
        'observations'
    ];
}
