<form method="post" action="/cars?x=10&y=20&z=true">

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
        <textarea type="text" class="form-control" name="description" id="description"></textarea>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-control" id="status">
            <option value="A">ACTIVE</option>
            <option value="B">BLOCKED</option>
        </select>
    </div>

    <button type="submit" class="btn btn-info">Speichern</button>
</form>