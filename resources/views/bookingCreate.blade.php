@extends('layouts.standard')

@section('header')
    <div class="row">
        <div class="col">
            <h1>Neue Buchung</h1>
        </div>
    </div>
@endsection

@section('main')
    <div class="row">
        <div class="col-md-6">
            @include('partials.bookingForm')
        </div>
    </div>    
@endsection