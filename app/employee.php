<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    protected $fillable = [
        'client_id',
        'name',
        'position',
        'phone',
        'email'
    ];
}
