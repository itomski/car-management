<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'short_name'
    ];

    //protected $with = ['vehicles'];

    public function vehicles() {
        return $this->hasMany('App\Vehicle');
    }

    // Abkürzung für den Weg: Category zu Vehicle zu Booking
    public function bookings() {
         return $this->hasManyThrough('App\Booking', 'App\Vehicle');
    }
}
