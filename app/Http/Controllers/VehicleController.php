<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::paginate(10);
        
        return view('vehicleList')
            ->withVehicles($vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicleCreate')
            ->withVehicle(new Vehicle())
            ->withCategories(\App\Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'brand' => ['required', 'max:25'],
            'type' => 'required|max:25',
            'registration' => 'required|min:6|max:20',
            'description' => 'required|min:2',
            'img' => 'required|min:5',
        ]);
        Vehicle::create($request->all());
        return redirect()->route('vehicles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicleDetails')
            ->withVehicle($vehicle);
            //->withPage('cars');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicleUpdate')
            ->withVehicle($vehicle)
            ->withCategories(\App\Category::all());
            //->withPage('cars');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $validData = $request->validate([
            'brand' => ['required', 'max:25'],
            'type' => 'required|max:25',
            'registration' => 'required|min:6|max:20',
            'description' => 'required|min:2',
            'img' => 'required|min:5',
        ]);

        $category = \App\Category::find($request->category_id);
        $vehicle->fill($request->all());
        $vehicle->category()->associate($category);
        $vehicle->save();
        return redirect()->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index');
    }
}
