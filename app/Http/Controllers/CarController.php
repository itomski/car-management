<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{   
    /*
    private $repo;

    // Constructor Dependency Injection, $repo wird vom IoC-Container automatisch eingeimpft 
    public function __construct(CarRepository $repo) {
        $this->repo = $repo;
    }
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = new \App\Thing();
        dd($t);


        // Anzeigen "aller" Daten
        /*
        $json = Storage::disk('local')->get('data.json');
        $data = \json_decode($json, true); // JSON wird in ein Array geparst
        */
        // Daten aus der Controller-Methode müssen an das Template weitergegeben werden
        //return view('car-list', ['data' => $arr]); // Template: car-list.blade.php

        $data = DB::select(DB::RAW('SELECT * FROM vehicles'));
        //dd($data);

        return view('car-list')
                    ->with(['data' => $data])
                    ->withPage('cars');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Formular anzeigen
        //return view('car-create_'); // Error, weil Template nicht da
        //return View::make('car-create');
        //return View::make('car-create', []);

        // if(View::exists('car-create_')) {
        //     return View::make('car-create_');
        // }
        // else {
        //     return View::make('car-create');
        // }

        if(view()->exists('car-create_')) {
            return view('car-create_');
        }
        else {
            return view('car-create')->withPage('cars');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Methoden Dependency Injection,
    public function store(Request $request)
    {
        // Formulardaten werden gespeichert

        //dd($request); // Dump and Die
        dump($request); // Dump
        
        /*
        $brand = $request->input('brand');
        $brand = $request->brand;

        echo $request->brand.'<br>';
        echo $request->path().'<br>';
        echo $request->url().'<br>';
        echo $request->fullUrl().'<br>';
        echo $request->method().'<br>';

        if($request->is('cars/*')) {
            echo 'cars/*<br>';
        }
        else {
            echo 'not cars/*<br>';
        }

        if($request->isMethod('get')) {
            echo 'GET<br>';
        }
        else {
            echo 'not GET<br>';
        }

        print_r($request->all());

        echo $request->input('typ', 'Kein Typ festgelegt'); // Alternativtext

        // nimmt nur vorgegebene infos mit
        print_r($request->only(['brand', 'status', 'registration', 'description']));

        print_r($request->except(['_token'])); // lässt nur _token aus

        echo $request->boolean('z').'<br>';

        if($request->has('type')) {
            echo 'type da<br>';
        }
        else {
            echo 'type nicht da<br>';
        }

        if($request->has(['brand', 'type'])) { // prüft ob alle da sind
            echo 'type & co da<br>';
        }
        else {
            echo 'type & co nicht da<br>';
        }

        if($request->hasAny(['brand', 'type'])) { // prüft ob mind 1 da ist
            echo 'brand & co da<br>';
        }
        else {
            echo 'brand & co nicht da<br>';
        }

        echo $request->query('x').'<br>'; // liest get Parameter aus
        print_r($request->query()); // Alle get Parameter als assiziatives Array
        echo $request->query('a', 'Nicht da').'<br>'; // Alternativwert

        echo $request->filled('brand').'<br>'; // ist es nicht leer?
        echo $request->missing('brand').'<br>'; // fehlt es im array?
        */

        /*
        // Alte Daten aus data.json einlesen
        $json = Storage::disk('local')->get('data.json');
        $arr = \json_decode($json, true); // json in ein Array parsen

        // Bestimmte Informationen aus dem Request als Array abfragen
        $data = $request->only(['brand', 'status', 'registration', 'description', 'category', 'img']);
        $arr[strtolower($request->category)][] = $data; // das alte Array wird um neue Daten erweitert

        //dd($arr);

        // Neuer Zustand wird in json umgewandelt und gespeichert
        Storage::disk('local')->put('data.json', \json_encode($arr));
        // Auf Übersicht der Fahrzeuge umleiten
        */

        // Raw Query
        //DB::insert('INSERT INTO vehicles (id, brand, registration, description, category, img, status)
        //                VALUES(null, ?, ?, ?, ?, ?, ?)', ['Ford', 'HH-AB123', 'Bla...', 'Kleinwagen', 'ford-fiesta.jpg', 'active']);

        /*
        DB::insert('INSERT INTO vehicles (id, brand, registration, description, category, img, status)
            VALUES(null, ?, ?, ?, ?, ?, ?)', [
                $request->brand, 
                $request->registration,
                $request->description, 
                $request->category,
                $request->img,
                $request->status]);
        */

        $data = $request->only(['brand', 'status', 'registration', 'description', 'category', 'img']);
        DB::insert('INSERT INTO vehicles (id, brand, registration, description, category, img, status)
            VALUES(null, :brand, :registration, :description, :category, :img, :status)', $data);
        
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Anzeige eines Datensatzes
        return "Show: ".$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Formular für das Editieren anzeigen
        return "Edit: ".$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Update bereits existierender Datensätze 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Löschen bereits existierender Datensätze
    }
}
