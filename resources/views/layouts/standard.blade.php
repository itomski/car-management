<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/css/app.css" rel="stylesheet">
    @stack('css')
    <style>
        @stack('doc_css')
    </style>
</head>
<body>
    <nav class="container">
        <ul class="nav nav-pills">
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
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'contact' ? 'active' : ''}}" href="{{ route('contact') }}">Kontakt</a>
            </li>
            
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

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </nav>

    <header class="container py-3 ">
        @yield('header')
    </header>

    <main class="container py-3" style="min-height: 500px">
        @yield('main')
    </main>

    <footer class="container py-3">
        <h2>Footer</h2>
    </footer>

    <script src="/js/app.js"></script>
    @stack('script')
</body>
</html>