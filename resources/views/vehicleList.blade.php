@extends('layouts.standard')
@section('header')
    <h1>List</h1>
@endsection

@section('main')
    <h2>Fahrzeuge</h2>

    @empty($vehicles)
        <p>Derzeit keine Fahrzeuge verfügbar.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Marke</th>
                    <th>Typ</th>
                    <th>Status</th>
                    <th>Kennzeichen</th>
                    <th>Beschreibung</th>
                    <th>Klasse</th>
                    <th>Bild</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($vehicles as $v)
                <tr>
                    <td>{{ $v->brand }}</td>
                    <td>{{ $v->type }}</td>
                    <td>{{ $v->status }}</td>
                    <td>{{ $v->registration }}</td>
                    <td>{{ $v->description }}</td>
                    <td>{{ $v->category }}</td>
                    <td><img src="/img/{{ $v->img }}" width="100"></td>
                    <td>
                        <a href="{{ route('vehicles.edit', ['vehicle' => $v->id]) }}" class="btn btn-warning">Bearbeiten</a>
                        
                        <form method="post" action="{{ route('vehicles.destroy', ['vehicle' => $v->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Löschen</a>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endempty
@endsection