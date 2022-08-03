<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <header class="container">
        @yield('header')
    </header>
    
    <nav class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/cars">Fahrzeuge</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="/we">Über uns</a></li>
            <li><a href="/contact">Kontakt</a></li>
            <li><a href="/admin">Admin</a></li>
        </ul>
    </nav>

    <main class="container">
        @yield('main')
    </main>

    <footer class="container">
        <h2>Footer</h2>
    </footer>

    <script src="/js/app.js"></script> 
</body>
</html>