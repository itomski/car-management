
@if($edit)
    <form method="post" action="{{ route('vehicles.update', $vehicle->id) }}">
    @method('PUT')
@else
    <form method="post" action="{{ route('vehicles.store') }}">
@endif

    @csrf

    <div class="mb-3">
        <label for="brand" class="form-label">Marke</label>
        <input type="text" class="form-control" name="brand" id="brand" value="{{ $vehicle->brand }}">
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Typ</label>
        <input type="text" class="form-control" name="type" id="type" value="{{ $vehicle->type }}">
    </div>

    <div class="mb-3">
        <label for="registration" class="form-label">Kennzeichen</label>
        <input type="text" class="form-control" name="registration" id="registration" value="{{ $vehicle->registration }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Beschreibung</label>
        <textarea class="form-control" name="description" id="description">{{ $vehicle->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Klasse</label>
        <select name="category" class="form-control" id="category">
            <option {{ $vehicle->category == 'Kleinwagen' ? 'selected' : '' }}>Kleinwagen</option>
            <option {{ $vehicle->category == 'Mittelklasse' ? 'selected' : '' }}>Mittelklasse</option>
            <option {{ $vehicle->category == 'Oberklasse' ? 'selected' : '' }}>Oberklasse</option>
            <option {{ $vehicle->category == 'VIP-Car' ? 'selected' : '' }}>VIP-Car</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="img" class="form-label">Bild</label>
        <input type="text" class="form-control" name="img" id="img" value="{{ $vehicle->img }}">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-control" id="status">
            <option value="active" {{ $vehicle->status == 'active' ? 'selected' : '' }}>Aktiv</option>
            <option value="blocked" {{ $vehicle->status == 'blocked' ? 'selected' : '' }}>Gesperrt</option>
        </select>
    </div>

    <button type="submit" class="btn btn-info">Speichern</button>
</form>
