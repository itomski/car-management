<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingInvoice extends Model
{
    protected $fillable = ['name', 'price', 'status'];
}
