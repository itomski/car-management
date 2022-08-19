@include('partials.showErrors')

<form action="{{ route('bookings.store') }}" method="post">

    @csrf

    @can('isAdmin')
        <div class="mb-3">
            <label for="user" class="form-label">Kunde</label>
            <select name="user" id="user" class="form-control">
                @foreach ($users as $u)
                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                @endforeach
            </select>
        </div>
    @else
        <input type="hidden" name="user" value="{{ auth()->id() }}"  />
    @endcan

    <div class="mb-3">
        <label for="vehicle" class="form-label">Fahrzeug</label>
        <select name="vehicle" id="vehicle" class="form-control">
            @foreach ($vehicles as $v)
                <option value="{{ $v->id }}">{{ $v->brand.', '.$v->type.', '.$v->registration }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="start_at" class="form-label">Start</label>
        <input type="date" class="form-control" name="start_at" id="start_at">
    </div>
    <div class="mb-3">
        <label for="end_at" class="form-label">Ende</label>
        <input type="date" class="form-control" name="end_at" id="end_at">
    </div>

    @can('isAdmin')
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="open">Offen</option>
                <option value="closed">Erledigt</option>
                <option value="canceled">Storniert</option>
            </select>
        </div>
    @else
        <input type="hidden" name="status" value="open" />    
    @endcan

    <button class="btn btn-info">Speichern</button>

</form>