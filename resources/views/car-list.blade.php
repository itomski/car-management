<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>List</h1>
    <ul>
        <li><a href="{{ route('details', ['id' => 1]) }}">Fahrzeug 1</a></li>
        <li><a href="{{ route('details', ['id' => 2]) }}">Fahrzeug 2</a></li>
        <li><a href="{{ route('details', ['id' => 3]) }}">Fahrzeug 3</a></li>
        <li><a href="{{ route('details', ['id' => 4]) }}">Fahrzeug 4</a></li>
        <li><a href="{{ route('details', ['id' => 5]) }}">Fahrzeug 5</a></li>
    </ul>
</body>
</html>