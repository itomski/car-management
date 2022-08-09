<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get liefert eine Collection von stdClass
        //DB::table('samples')->dump();
        
        DB::listen(function($sql) {
            dump($sql);
        });
        
        //$data = DB::table('samples')->get(); // Collection von stdClass
        //$data = DB::table('samples')->first(); // stdClass
        //$data = DB::table('samples')->value('name'); // Nur name-Value aus dem ersten Datensatz
        //$data = DB::table('samples')->pluck('name'); // Nur name-Value aus allen Datensätzen
        //$data = DB::table('samples')->where('enabled', true)->get(); // nur Datensätze mit enabled auf true

        // $data = DB::table('samples')
        //     ->where('count', '>', 50) // count > 50
        //     ->where('enabled', true) // AND enabled = 1
        //     ->get();

        // $data = DB::table('samples')
        //     //->where('count', '>', 50) // count > 50
        //     ->whereIn('id', [2,4,6,8,10])
        //     ->whereBetween('count', [60, 80])
        //     // ->where(function($q) {
        //     //     $q->whereNull('deleted_at');
        //     //     $q->orWhere('enabled', true); // OR enabled = 1   
        //     // })
        //     ->where(fn($q) => $q->whereNull('deleted_at')->orWhere('enabled', true)) // Ab PHP 7.4
        //     ->get();
            
        // $data = DB::table('samples')
        //     ->where(
        //         ['count', '>', 50],
        //         ['name', 'like', '%Pet%'],)
        //     ->get();

        // $data = DB::table('samples')
        //     ->wherColumn(['created_at', '<', 'updated_at'])
        //     ->get();


        //$data = DB::table('samples')->count();
        //$data = DB::table('samples')->avg('count'); // Durchschnitt
        //$data = DB::table('samples')->min('count'); //Max, Min

        // $data = DB::table('samples')
        //         ->select('name as username', 'id')
        //         ->get(); // Spalte wird in den Daten mit AS umbenannt

        // $data = DB::table('samples')
        //         ->pluck('name', 'id'); // ID wird als Key verwendet

        // $data = DB::table('samples')
        //     ->whereRaw('deleted_at = ? AND enabled = ?', [null, true])
        //     //->where(fn($q) => $q->whereNull('deleted_at')->orWhere('enabled', true)) // Ab PHP 7.4
        //     ->get();

        // $data = DB::table('samples')
        //     ->selectRaw('COUNT(*) AS anzahl, enabled')
        //     //->where()
        //     ->groupBy('enabled')
        //     ->get();

        // $data = DB::table('samples')
        //     ->selectRaw('SUM(count) AS summe, enabled')
        //     ->groupBy('enabled')
        //     ->havingRaw('summe > 200')
        //     ->get();

        // Inner Join - Liefert nur Datensätze für die eine Kombo besteht
        // $data = DB::table('samples')
        //     ->join('details', 'samples.detail_id', '=', 'details.id')
        //     ->select('samples.*', 'details.name')
        //     ->get();

        // $data = DB::table('samples')
        //     ->leftJoin('details', 'samples.detail_id', '=', 'details.id')
        //     ->select('samples.*', 'details.name')
        //     ->get();

        // $data = DB::table('samples')
        //     ->rightJoin('details', 'samples.detail_id', '=', 'details.id')
        //     ->select('samples.*', 'details.name')
        //     ->get();

        $data = DB::table('samples')
            ->crossJoin('details')
            ->get();

        dd($data);
        return view('samples')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
