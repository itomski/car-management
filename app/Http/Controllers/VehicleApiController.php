<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleApiController extends Controller
{
    public function all() {
        $vehicles = \App\Vehicle::all();
        return response()->json(['data' => $vehicles], 200);
    }
}
