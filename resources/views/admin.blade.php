@extends('layouts.standard')
@section('header')
    <h1>Admin</h1>
@endsection

@section('main')

    <div class="row">
        <div class="col">
            @can('isAdmin')
                <p><a href="{{ route('vehicles.create') }}" class="btn btn-success">Neues Fahrzeug</a></p>
            @endcan
            <p><a href="{{ route('bookings.create') }}" class="btn btn-success">Neue Buchung</a></p>
            <p><a href="{{ route('users.index') }}" class="btn btn-success">User-Übersicht</a></p>
        </div>
    </div>
@endsection