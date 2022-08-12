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
        'status'
    ];

    // ManyToOne
    public function category() {
        return $this->belongsTo('App\Category');
    }

    // Query Scope
    // scope muss als Prefix verwendet werden
    public function scopeActive($query) {
        return $query->where('status', 'active');
    }

    // Dynamic Query Scope
    public function scopeOfBrand($query, $brand) {
        return $query->where('brand', $brand);
    }
}
