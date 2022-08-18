<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = []; // Alle attribute sind fillable

    // OneToOne
    public function user() {
        return $this->belongsTo('App\User');
    }
}
