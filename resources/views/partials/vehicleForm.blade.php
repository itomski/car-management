@include('partials.showErrors')

@if($edit)
    <form method="post" action="{{ route('vehicles.update', [$vehicle->id]) }}" enctype="multipart/form-data">
    @method('PUT')
@else
    <form method="post" action="{{ route('vehicles.store') }}" enctype="multipart/form-data">
@endif

    @csrf

    <input type="hidden" name="redirectTo" value="{{ URL::previous() }}">

    <div class="mb-3">
        <label for="brand" class="form-label">Marke</label>
        <input type="text" class="form-control @error('brand')is-invalid @enderror" name="brand" id="brand" value="{{ old('brand', $vehicle->brand) }}" aria-describedby="brandFeedback">
        @error('brand')
            <div id="brandFeedback" class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Typ</label>
        <input type="text" class="form-control" name="type" id="type" value="{{ old('type', $vehicle->type) }}">
    </div>

    <div class="mb-3">
        <label for="registration" class="form-label">Kennzeichen</label>
        <input type="text" class="form-control" name="registration" id="registration" value="{{  old('registration', $vehicle->registration) }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Beschreibung</label>
        <textarea class="form-control" name="description" id="description">{{ old('description', $vehicle->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Klasse</label>
        <select name="category_id" class="form-control" id="category_id">
            @foreach ($categories as $category)
                @if(old('category_id', $vehicle->category->id ?? 0) == $category->id)
                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="img" class="form-label">Bild</label>
        <input type="file" class="form-control-file" name="img" id="img">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-control" id="status">
            <option value="active" {{ old('status', $vehicle->status) == 'active' ? 'selected' : '' }}>Aktiv</option>
            <option value="blocked" {{ old('status', $vehicle->status) == 'blocked' ? 'selected' : '' }}>Gesperrt</option>
        </select>
    </div>

    <button type="submit" class="btn btn-info">Speichern</button>
</form>
