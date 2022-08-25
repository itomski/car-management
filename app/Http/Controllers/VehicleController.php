<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Http\Requests\VehicleRequest;
use App\Notifications\VehicleStatusChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Http\Response;
//use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Notification;

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
        //dump(auth()->user()->notifications);
        dump(auth()->user()->unreadNotifications);

        foreach(auth()->user()->unreadNotifications as $n) {
            $n->markAsRead();
        }

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
        Gate::authorize('isAdmin');
        
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
    public function store(VehicleRequest $request)
    {
        $file = $request->file('img');
        $path = $file->store('img', 'public'); // storage/app/public/img
        // $file = $request->file('img');
        // $fileName = $file->getClientOriginalName(); // Original_namen abfragen
        // // Originalname wird verwendet
        // $path = $file->storeAs('img', $fileName, 'public');

        //dump($path);

        $data = $request->all();
        $data['img'] = $path;

        $file = $request->file('img');
        $smallPath = $file->storeAs('small', $path, 'public');
        
        // Kopie im Ordner small wird angepasst
        $this->createImageVariant(public_path('storage/'.$smallPath), 200, 200);

        // public_path() // Absolter pfad für public-dir
        // storage_path() // Absolter pfad für storage-dir

        Vehicle::create($data);
        //return redirect()->route('vehicles.index');

        $data = $request->only(['redirectTo']);
        
        if(!empty($data['redirectTo'])) {
            return redirect()->to($data['redirectTo']);
        }
        return redirect()->route('vehicles.index');
    }

    private function createImageVariant($path, $w, $h) {
        $image = Image::make($path)->resize($w, $h, function($c) {
            $c->aspectRatio();
            //$c->upsize();
        });
        $image->save($path);
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

        auth()->user()->notify(new VehicleStatusChange($vehicle));
        //Notification::send(auth()->user, new VehicleStatusChange());


        // TODO: Speichern des Bilde wie in store implementieren

        $data = $request->only(['redirectTo']);

        if(!empty($data['redirectTo'])) {
            return redirect()->to($data['redirectTo']);
        }
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
