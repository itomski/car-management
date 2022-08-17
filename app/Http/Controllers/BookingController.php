<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bookingList', ['bookings' => \App\Booking::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookingCreate')
                    ->withUsers(\App\User::all())
                    ->withVehicles(\App\Vehicle::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Statische Methoden werden direkt auf der Klasse ausgeführt
        // KlassenName::methodenName()
        // $v = \App\Vehicle::find(1) // In der DB nach einem Fahrzeug mit der ID 1 suchen

        // Instanzmethoden werden auf einer Instanz einer Klasse ausgeführt
        // Instanz ist ein Objekt das aus einer Klasse erzeugt wurde
        // $objektName->methodenName()
        // $v->save(); // Ein bestimmtes Fahrzeug-Objekt speichern


        // Sind alle nötigen Eigenschaften fillable dann
        //$b = new \App\Booking::create($request->all());

        $b = new \App\Booking();
        $b->fill($request->all());
        $b->user()->associate(\App\User::find($request->user));
        $b->vehicle()->associate(\App\Vehicle::find($request->vehicle));
        $b->save();

        return redirect()->route('bookings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index');
    }
}
