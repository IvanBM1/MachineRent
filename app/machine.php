<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class machine extends Model
{
    protected $table = "machines";
    protected $fillable = [
        'economic',
        'brand',
        'model',
        'series',
        'motor',
        'year',
        'hp',
        'motorseries',
        'status',
        'observations',
        'day_1',
        'day_2',
        'day_3',
        'day_4',
        'day_7',
        'day_15',
        'day_30',
    ];


}
