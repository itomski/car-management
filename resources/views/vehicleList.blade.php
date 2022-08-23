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
                    <td>{{ $v->category->name ?? 'Nicht gesetz' }}</td>
                    <td><img src="/storage/{{ $v->img }}" width="100" alt="{{ $v->brand.' '.$v->type }}"></td>
                    <td>
                        <a href="{{ route('vehicles.show', ['vehicle' => $v->id]) }}" class="btn btn-success">
                            <i class="fa fa-eye" aria-hidden="true" title="Details"></i>
                        </a>

                        @can('isAdmin')
                            <a href="{{ route('vehicles.edit', ['vehicle' => $v->id]) }}" class="btn btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true" title="Bearbeiten"></i>
                            </a>
                            
                            <form method="post" action="{{ route('vehicles.destroy', ['vehicle' => $v->id]) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash-o" aria-hidden="true" title="Löschen"></i>
                                </a>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row justify-content-center">
            <div class="col-5">{{ $vehicles->links() }}</div>
        </div>

    @endempty
@endsection