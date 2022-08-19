@extends('layouts.standard')

@section('header')
@endsection

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <script>
                    setTimeout(function() {
                        window.location.href = '/vehicles';
                    }, 2000);
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
