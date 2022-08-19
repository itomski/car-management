<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = auth()->user()->profile;
        return view('updateProfile')
                    ->withProfile($profile);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        $profile = auth()->user()->profile;
        if(!$profile) {
            $profile = new \App\Profile();
            $profile->user_id = auth()->user()->id;
        }
        $profile->fill($request->all());
        $profile->save();

        return redirect()->back()->with('success', 'Gespeichert');
    }
}
