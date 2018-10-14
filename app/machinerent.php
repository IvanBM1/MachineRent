<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class machinerent extends Model
{
    protected $table = 'machinerents';
    protected $fillable = [
        'rent_id',
        'machine_id',
        'dateinit',
        'dateend',
        'rentcost',
        'description',
        'concret'
    ];
}