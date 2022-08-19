@if($errors->any())
    <div class="alert alert-warning" role="alert">
        @foreach ($errors->all() as $e)
            <p>{{ $e }}</p>
        @endforeach
    </div>
@endif