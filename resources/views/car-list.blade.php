@extends('layouts.standard')
@section('header')
    <h1>List</h1>
@endsection

@section('main')
    <h2>Fahrzeuge</h2>

    @dump($data)

    @empty($data)
        <p>Derzeit keine Fahrzeuge verfügbar.</p>
    @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Marke</th>
                        <th>Status</th>
                        <th>Kennzeichen</th>
                        <th>Beschreibung</th>
                        <th>Klasse</th>
                        <th>Bild</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $car)
                    <tr>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->status }}</td>
                        <td>{{ $car->registration }}</td>
                        <td>{{ $car->description }}</td>
                        <td>{{ $car->category }}</td>
                        <td><img src="/img/{{ $car->img }}" width="100"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    @endempty
@endsection