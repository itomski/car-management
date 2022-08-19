@include('partials.showErrors')

@include('partials.showSuccess')

{!! Form::open(['action' => 'ProfileController@store', 'method' => 'POST']) !!}
    
    <div class="mb-3">
        {!! Form::label('gender', 'Geschlecht', ['class' => 'form-label']) !!}
        {!! Form::select('gender', ['' => 'Auswählen', 'w' => 'Frau', 'm' => 'Mann'], old('gender', $profile->gender ?? ''), ['class' => 'form-control']) !!}
    </div>

    <div class="mb-3">
        {!! Form::label('firstname', 'Vorname', ['class' => 'form-label']) !!}
        {!! Form::text('firstname', old('firstname', $profile->firstname ?? ''), ['class' => 'form-control']) !!}
    </div>

    <div class="mb-3">
        {!! Form::label('lastname', 'Nachname', ['class' => 'form-label']) !!}
        {!! Form::text('lastname', old('lastname', $profile->lastname ?? ''), ['class' => 'form-control']) !!}
    </div>

    <div class="mb-3">
        {!! Form::label('city', 'Stadt', ['class' => 'form-label']) !!}
        {!! Form::text('city', old('city', $profile->city ?? ''), ['class' => 'form-control']) !!}
    </div>

    <div class="mb-3">
        {!! Form::label('street', 'Straße', ['class' => 'form-label']) !!}
        {!! Form::text('street', old('street', $profile->street ?? ''), ['class' => 'form-control']) !!}
    </div>

    <div class="mb-3">
        {!! Form::label('street_nr', 'Hausnr.', ['class' => 'form-label']) !!}
        {!! Form::text('street_nr', old('street_nr', $profile->street_nr ?? ''), ['class' => 'form-control']) !!}
    </div>

    <div class="mb-3">
        {!! Form::label('zip', 'PLZ', ['class' => 'form-label']) !!}
        {!! Form::text('zip', old('zip', $profile->zip ?? ''), ['class' => 'form-control']) !!}
    </div>

    <div class="mb-3">
        {!! Form::label('country', 'Land', ['class' => 'form-label']) !!}
        {!! Form::select('country', ['' => 'Auswählen', 'DE' => 'Deutschland', 'FR' => 'Frankreich', 'IT' => 'Italien'], old('country', $profile->country ?? ''), ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Speichern', ['class' => 'btn btn-primary']) !!}


{!! Form::close() !!}