@extends('layouts.standard')

@section('header')
    <h1>PayPal</h1>
@endsection

@section('main')
    
    @if(session('msg'))
        <div class="alert alert-info">{{ session('msg') }}</div>
    @endif

    <div>
        <h2>Express Checkout</h2>
        125 € <a href="{{ route('paypal.checkout') }}" class="btn btn-success">Bezahlen</a>
    </div>

@endsection