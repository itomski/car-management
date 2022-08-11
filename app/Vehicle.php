<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'brand', 
        'type',
        'registration', 
        'description',
        'category',
        'img',
        'status',
    ];
}
