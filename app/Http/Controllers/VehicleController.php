<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Http\Requests\VehicleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Http\Response;
//use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;

class VehicleController extends Controller
{
    public function __construct() {
        //$this->middleware('aDate'); // wird nur in diesem Controller verwendet
        $this->middleware('aDate')->only('index'); // wird nur in diesem Controller für index verwendet
    }


    // public function __construct() {
    //     $this->authorizeResource(Vehicle::class, 'vehicle');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(request());

        // Log::channel('daily')->info('Das ist das Haus von Nikigraus 1');
        // logger()->error('Das ist das Haus von Nikigraus', ['file' => __FILE__, 'line' => __LINE__, 'method' => __METHOD__]);


        // viewAny in VehiclePolicy prüfen
        //Gate::authorize('viewAny', Vehicle::class);

        // Sessions schreiben
        //session()->put('fav', []);
        // request()->session()->push('fav', now()); // für die dauer der session
        // request()->session()->flush('xyz', 'Wert'); // nur für die Dauer des Requests
        // request()->session()->reflash(); // alle flash Werte werden um ein Request verlängert
        // request()->session()->keep('xyz'); // nur xyz wird ein Request verlängert
        // request()->session()->forget('xyz'); // Werte aus der Session löschen
        
        // Sessions lesen
        //dd(request()->session()->get('fav', 'Nicht da...'));
        //dd(request()->session()->all());
        //dd(session()->all());

        // request()->session()->regenerate(); // SessionID neu generieren
        // session()->invalidate(); // Session zerstören

        $vehicles = Vehicle::paginate(10);

        //$v = Vehicle::find(199);
        //dump($v);
        // $v = Vehicle::findOrFail(199);
        // dd($v);


        // Cookie schreiben
        //cookie()->queue('besucher_id', '1234', 5);

        // Cookie lesen
        //dd(request()->cookie('besucher_id2'));

        // Cookie über Response schreiben
        // return response(view('vehicleList')->withVehicles($vehicles))
        //         ->withCookie('besucher_id2', '1234', 5);

        // dump(request()->user());

        // if(Auth::check()) {
        //     dump('angemeldet');
        //     dump(Auth::user());
        // }
        // else {
        //     dump('nicht angemeldet');
        // }

        return view('vehicleList')
            //->withLink('<a href="#">Link</a>')
            ->withVehicles($vehicles);
            //->withV($v);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(request());
        Gate::authorize('isAdmin');
        
        // if(Gate::allows('isAdmin')) {
            return view('vehicleCreate')
                ->withVehicle(new Vehicle())
                ->withCategories(\App\Category::all());
        // }
        // else {
        //     return Gate::denies(403);
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        // Schlägt die Validierung fehl, leitet Laravel uns zum Ursprung zurück
        // $request->validate([
        //     'brand' => ['required', 'max:25'],
        //     'type' => 'required|max:25',
        //     'registration' => 'required|min:6|max:20',
        //     'description' => 'required|min:2',
        //     'img' => 'required|min:5',
        // ]);

        // save/create wird auf Model-Objekten ausgeführt
        // store wird auf Illiminate\Http\File-Objekten ausgeführt

        $file = $request->file('img');
        // Als Name wird ein Hash verwendet
        $path = $file->store('img', 'public'); // storage/app/public/img

        // $file = $request->file('img');
        // $fileName = $file->getClientOriginalName(); // Original_namen abfragen
        // // Originalname wird verwendet
        // $path = $file->storeAs('img', $fileName, 'public');

        $data = $request->all();
        $data['img'] = $path;

        Vehicle::create($data);
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
        Log::info('Edit für Fahrzeug: ', ['vehicle_id' => $vehicle->id]);

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
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
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
        // disk('public') -> storage/app/public + /img/...
        Storage::disk('public')->delete($vehicle->img);
        $vehicle->delete();
        //return redirect()->route('vehicles.index');
        return redirect()->back();
    }
}
