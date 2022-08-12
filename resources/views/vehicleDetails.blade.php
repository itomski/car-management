@extends('layouts.standard')

@section('header')
    <div class="row">
        <div class="col">
            <h1>Fahrzeug:{{ $vehicle->registration }}</h1>
        </div>
    </div>
@endsection

@section('main')
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="/img/{{ $vehicle->img }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">{{ $vehicle->type }}</p>
                    <p class="card-text">{{ $vehicle->description }}</p>
                </div>
            </div>
        </div>
    </div>    
@endsection