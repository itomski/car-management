@extends('layouts.standard')

@section('header')
    <div class="row">
        <div class="col">
            <h1>Fahrzeug bearbeiten</h1>
        </div>
    </div>
@endsection

@section('main')
    <div class="row">
        <div class="col-md-6">
            @include('partials.vehicleForm', ['edit' => true])
        </div>
    </div>    
@endsection