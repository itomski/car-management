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
        
        
        
        
        // $vehicle = new Vehicle();
        // $vehicle->brand = 'Fiat';
        // $vehicle->type = 'Panda';
        // $vehicle->registration = 'HH-AB123';
        // $vehicle->description = 'Dies und das';
        // $vehicle->category = 'Kleinwagen';
        // $vehicle->img = 'test.jpg';
        // $vehicle->status = 'active';
        // $vehicle->save();

        // Mass Assignment
        // Objekt wird in der DB gespeichert
        // Vehicle::create([
        //     'brand' => 'Fiat',
        //     'type' => 'Panda',
        //     'registration' => 'HH-AB125',
        //     'description' => 'Dies und das',
        //     'category' => 'Kleinwagen',
        //     'img' => 'test.jpg',
        //     'status' => 'active',
        // ]);

        // Update
        // $vehicle = Vehicle::find(38);
        // //$vehicle = new Vehicle();
        // $vehicle->brand = 'VW';
        // $vehicle->save();
        //dump($vehicle);

        //$vehicles = Vehicle::all(); // Alle Datensätze abfragen
        // $vehicles = Vehicle::where('status', 'active')
        //                         ->where('category', 'Oberklasse')
        //                         ->get();
        // dump($vehicles);
        
        $vehicles = Vehicle::all();
        return view('vehicleList')
            ->withVehicles($vehicles)
            ->withPage('cars');
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
            ->withPage('cars');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        return "SHOW";
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
            ->withPage('cars');
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
        $vehicle->fill($request->all())->save();
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
