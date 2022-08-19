@extends('layouts.standard')
@section('header')
    <h1>List</h1>
@endsection

@section('main')
    <h2>User</h2>
    
    @empty($users)
        <p>Derzeit keine User verfügbar.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Benutzername</th>
                    <th>E-Mail</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Stadt</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->profile->firstname ?? 'nicht gesetzt' }}</td>
                    <td>{{ $u->profile->lastname ?? 'nicht gesetzt' }}</td>
                    <td>{{ $u->profile->city ?? 'nicht gesetzt' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endempty
@endsection