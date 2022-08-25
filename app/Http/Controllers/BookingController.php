<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Mail\BookingCreated;
use App\Mail\Newsletter;
use App\Mail\NextNewsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->user()->can('isAdmin')) {
            $bookings = \App\Booking::all();
        }
        else {
            $bookings = request()->user()->bookings;
        }

        return view('bookingList', ['bookings' => $bookings]);
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
        $request->validate([
            'start_at' => 'required|date_format:Y-m-d|after_or_equal:today',
            'end_at' => 'required|date_format:Y-m-d|after_or_equal:start_at',
        ]);

        $b = new \App\Booking();
        $b->fill($request->all());
        $user = \App\User::find($request->user);
        $b->user()->associate($user);
        $b->vehicle()->associate(\App\Vehicle::find($request->vehicle));
        $b->save();

        $admin = \App\User::find(1);

        // Mail::to($user)
        //     ->cc($admin)
        //     //->bcc($admin)
        //     ->send(new BookingCreated($b));

        // mit markdown
        Mail::to($user)
            ->send(new NextNewsletter("Das ist die Nachricht..."));    

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

    public function newsletter()
    {
        $users = \App\User::all();

        foreach($users as $user) {
            // Mail::to($user)->send(new Newsletter('Das ist eine Nachricht für alle'));
            
            // Versand im Hintergrund
            // Mail::to($user)->queue(new Newsletter('Das ist eine Nachricht für alle'));
            
            // Versand im Hintergrund mit 20 Sek Verzögerung
            Mail::to($user)
                ->later(now()->addSeconds(60), new Newsletter('Das ist eine Nachricht für alle'));
        }

        return 'Newsletter verschickt';
    }
}
