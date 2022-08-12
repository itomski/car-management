<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'short_name'
    ];

    // OneToMany
    public function vehicles() {
        return $this->hasMany('App\Vehicle');
    }
}
