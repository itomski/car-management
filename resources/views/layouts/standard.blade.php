<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
    <style>
        @stack('doc_css')
    </style>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="/">
            <i class="fa fa-car" aria-hidden="true"></i> Car Management
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'home' ? 'active' : ''}}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'vehicles' ? 'active' : ''}}" href="{{ route('vehicles.index') }}">Fahrzeuge</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'services' ? 'active' : ''}}" href="{{ route('services') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'we' ? 'active' : ''}}" href="{{ route('we') }}">Über uns</a>
                </li>

                {{-- @can('viewAny', \App\Vehicle::class) --}}
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'contact' ? 'active' : ''}}" href="{{ route('contact') }}">Kontakt</a>
                </li>
                {{-- @endcan --}}
            
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) == 'login' ? 'active' : ''}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'register' ? 'active' : ''}}" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    @can('isAdmin')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'admin' ? 'active' : ''}}" href="{{ route('admin') }}">Admin</a>
                        </li>
                    @endcan

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            
                            <a class="dropdown-item" href="{{ route('profile.index') }}">Profil</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <header class="container py-3" style="margin-top: 80px" >
        @yield('header')
    </header>

    <main class="container py-3" style="min-height: 500px">
        @yield('main')
    </main>

    <footer class="container py-3">
        <h2>Footer</h2>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('script')
</body>
</html>