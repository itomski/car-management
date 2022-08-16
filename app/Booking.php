<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'start_at', 'end_at', 'status'
    ];

    // protected $casts = [
    //     'active' => 'boolean'
    // ];

    protected $dates = [
        'start_at', 'end_at'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function vehicle() {
        return $this->belongsTo('App\Vehicle');
    }
}
