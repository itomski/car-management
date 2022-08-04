@extends('layouts.standard')
@section('header')
    <h1>Admin</h1>
@endsection

@section('main')
    <h2>Playground</h2>

    <p>Vorname: {!! $firstname !!}</p>
    <p>Nachname: {{ $lastname }}</p>
    <p>Nickname: {{ $nickname }}</p>
    <p>Fähigkeit: {{ $feature }}</p>

    @dump($t1)

    @if(count($numbers) > 1)
        <p>Du hast mehr als eine Zahl</p>
    @endif

    @unless (count($numbers) == 0)
        <p>Du hast mehr als 0 Zahlen</p>
    @endunless

    @if(count($numbers) == 0)
        <p>Du hast keine Zahlen</p>
    @elseif(count($numbers) > 5)
        <p>Du hast mehr als 5 Zahlen</p>
    @else
        <p>Du hast mehr als 0 aber weniger als 5 Zahlen</p>
    @endif

    @isset($tools) {{-- var muss definiert und != null sein --}}
        <p>{{ $tools->name() }}</p>
    @endisset

    @dump($firstname)

    @switch($firstname)
        @case('Peter')
            <p>Du bist wahrscheinlich Spiderman</p>
        @break

        @case('Bruce')
            <p>Du bist wahrscheinlich Hulk</p>
        @break

        @case('Natasha')
            <p>Du bist wahrscheinlich Black Widow</p>
        @break

        @default
            <p>Du bist wahrscheinlich ... hym... keine Ahnung</p>

    @endswitch

    <ul>
    @for($i = 0; $i < 5; $i++)
        <li>{{ $i }}</li>
    @endfor
    </ul>

    <ul>
    @foreach($numbers as $n)
        <li>{{ $n }}</li>
    @endforeach
    </ul>

    <ul>
    @forelse($numbers as $n)
        <li>{{ $n }}</li>
    @empty
        <li>LEER!!!!!</li> 
    @endforelse
    </ul>

    <ul>
    @while($zahl > 0)
        <li>{{ $zahl-- }}</li>
        @continue($zahl == 95)
        <li>Ist eine gute Zahl</li>
        @break($zahl == 90)
    @endwhile
    </ul>

    <ul>
    @foreach($numbers as $n)
        @if($loop->first)
            <li>###{{ $n }}</li>
        @endif   

        <li>{{ $n }} -- {{ $loop->iteration }} von {{ $loop->count }}</li>

        @if($loop->last)
            <li>{{ $n }}###</li>
        @endif
    @endforeach
    </ul>

    @includeWhen($error, 'partials.subadmin', ['msg' => 'Ein ganz großer Fehler!'])

    {{-- 
    // Wenn $error false ist
    @includeUnless($error, 'partials.subadmin', ['msg' => 'Ein ganz großer Fehler!'])

    @include('partials.subadmin', ['msg' => 'Ein ganz großer Fehler!'])

    @includeIf('partials.subadmin2', ['msg' => 'Ein anderer Fehler'])

    @includeFirst(['partials.subadmin2', 'partials.subadmin'], ['msg' => 'Ein anderer Fehler'])
    --}}
@endsection