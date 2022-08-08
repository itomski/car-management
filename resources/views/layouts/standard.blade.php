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
    <header class="container">
        @yield('header')
    </header>
    
    <nav class="container">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ $page == 'home' ? 'active' : ''}}" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $page == 'cars' ? 'active' : ''}}" href="{{ route('cars.index') }}">Fahrzeuge</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $page == 'services' ? 'active' : ''}}" href="{{ route('services') }}">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $page == 'we' ? 'active' : ''}}" href="{{ route('we') }}">Über uns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $page == 'contact' ? 'active' : ''}}" href="{{ route('contact') }}">Kontakt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $page == 'admin' ? 'active' : ''}}" href="{{ route('admin') }}">Admin</a>
            </li>
        </ul>
    </nav>

    <main class="container">
        @yield('main')
    </main>

    <footer class="container">
        <h2>Footer</h2>
    </footer>

    <script src="/js/app.js"></script>
    @stack('script')
</body>
</html>