<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Anzeigen "aller" Daten

        $json = Storage::disk('local')->get('data.json');
        $arr = \json_decode($json, true); // JSON wird in ein Array geparst
        // Daten aus der Controller-Methode müssen an das Template weitergegeben werden
        //return view('car-list', ['data' => $arr]); // Template: car-list.blade.php
        return view('car-list')->withData($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Formular anzeigen
        return view('car-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $json = Storage::disk('local')->get('data.json');
        $arr = \json_decode($json, true);

        $data = $request->only(['brand', 'status', 'registration', 'description']);
        $arr[] = $data;
        //echo \json_encode($list);
        Storage::disk('local')->put('data.json', \json_encode($arr));
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
