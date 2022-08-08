<form method="post" action="{{ route('cars.store') }}">

    @csrf

    <div class="mb-3">
        <label for="brand" class="form-label">Marke</label>
        <input type="text" class="form-control" name="brand" id="brand">
    </div>

    <div class="mb-3">
        <label for="registration" class="form-label">Kennzeichen</label>
        <input type="text" class="form-control" name="registration" id="registration">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Beschreibung</label>
        <textarea class="form-control" name="description" id="description"></textarea>
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Klasse</label>
        <select name="category" class="form-control" id="category">
            <option>Kleinwagen</option>
            <option>Mittelklasse</option>
            <option>Oberklasse</option>
            <option>VIP-Car</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="img" class="form-label">Bild</label>
        <input type="text" class="form-control" name="img" id="img">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-control" id="status">
            <option value="active">ACTIVE</option>
            <option value="blocked">BLOCKED</option>
        </select>
    </div>

    <button type="submit" class="btn btn-info">Speichern</button>
</form>
