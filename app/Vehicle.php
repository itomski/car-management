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

    // Alle Attribute die als DateObjekt gehandhabt werden sollen
    // Eingaben werden automatisch in ein Carbon Date umgewandet
    // protected $dates = [
    //    'last_check'
    // ];

    // default DateTime-Format festlegen
    //protected $dateFormat = 'Y-m-d H:i:s';

    // ManyToOne
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function bookings() {
        return $this->hasMany('App\Booking');
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

    // // Mutator
    // public function setBrandAttribute($brand) {
    //     $this->attributes['brand'] = ucfirst(strtolower($brand));
    // }

    // // Accessor
    // public function getBrandAttribute() {
    //     return strtoupper($this->attributes['brand']);
    // }

}
