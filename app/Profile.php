<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Profile extends Model
{
    protected $guarded = []; // Alle attribute sind fillable

    // OneToOne
    public function user() {
        return $this->belongsTo('App\User');
    }

    /*
    protected static function boot() {

        parent::boot();

        static::updating(function($model) {
            Log::info('want change profile of '.$model->user->name);
        });

        static::updated(function($model) {
            Log::info('profile changed '.$model->user->name);
        });
    }
    */
}
