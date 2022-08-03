@extends('layouts.standard')
@section('header')
    <h1>List</h1>
@endsection

@section('main')
    <h2>Fahrzeuge</h2>
    <ul>
        @foreach ($data as $car)
            <li><a href="{{ route('details', ['id' => 1]) }}">{{ $car['brand'] }}</a></li>
        @endforeach
    </ul>
@endsection