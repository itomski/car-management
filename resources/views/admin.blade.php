@extends('layouts.standard')
@section('header')
    <h1>Admin</h1>
@endsection

@section('main')

    <div class="row">
        <div class="col">
            <p><a href="{{ route('vehicles.create') }}" class="btn btn-success">Neues Fahrzeug</a></p>
        </div>
    </div>
@endsection