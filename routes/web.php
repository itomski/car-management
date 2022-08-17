<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// nur get Requests erlaubt
Route::get('/', function () {
    return view('welcome')->withPage('home');
})->name('home');

// alle Request-Methoden sind erlaubt
// Route::any('/cars', 'CarController@index');

// Alle Methoden werden bereitgestellt und müssen im Controller verfügbar sein
//Route::resource('/cars', 'CarController')->only(['show', 'create']);

//Route::resource('/cars', 'CarController')->except(['create']);

// Mehrere Resource-Controller auf einen Schlag einbinden
Route::resources([
    'cars' => 'CarController',
    'users' => 'UserController'
]);

/*
Route::apiResources([
    'cars' => 'CarController',
    'users' => 'UserController'
]);
*/

/*
// id = Pflichtattribut
Route::get('/cars/id/{id}', function ($id) {
    return "Car ID ".$id;
});

// id = optionales Pflichtattribut
Route::get('/cars/id/{id?}', function ($id = null) {
    return "Car ID ".$id;
});
*/

/*
// id = optionales Pflichtattribut mit Defaultwert
Route::get('/cars/id/{id?}', function ($id = 0) {
    return "Car ID ".$id;
})->name('details')->where('id', '[0-9]+'); // Name muss einzigartig sein

// erlaubt nur get und post Requests
Route::match(['get', 'post'], '/services', function () {
    return "Services";
});
*/

Route::get('/services', function () {
    return view('services')->withPage('services');
})
->name('services');

/*
Route::get('/services/{type}', function ($type) {
    return "Services: ".$type;
})->where('type', '[A-Za-zö]+');

Route::get('/services/{type}', function ($type) {
    return "Services: ".$type;
})->where('type', 'seo|sea|sem'); // or
+/

/*
// mit Dependency Injection
Route::get('/we', function (Request $request) {
    return "We".$request->id; // Liest die id aus dem get-Request ?id=75
});
*/

/*
Route::get('/we', function () {
    return view('we');
});
*/

// Oder kurz
Route::view('/we', 'we', ['page' => 'we'])
    ->name('we');

Route::redirect('/about', '/we', Response::HTTP_MOVED_PERMANENTLY);
//Route::permanentRedirect('/about', '/we');

/*
// Facade
Route::get('/we', function () {
    return Illuminate\Support\Facades\Request::all();
});

// Helper
Route::get('/we', function () {
    return request()->id;
});
*/

Route::get('/contact', 'ContactController@form')->name('contact');
Route::post('/contact', 'ContactController@submit');

Route::get('/admin', function () {
    $arr = ['firstname' => 'Hans', 'lastname' => 'Parker'];

    $t1 = 'New York';
    $t2 = 'Boston';

    return view('admin')
        ->withPage('admin')
        ->with($arr)
        ->with('nickname', 'Spiderman')
        ->withFeature('Spinnennetz')
        ->with(compact('t1', 't2'))
        ->with('tools', null)
        ->with('numbers', [1,3,4,7,9])
        ->with('zahl', 100)
        ->with('error', true);
        //->with('town', compact('t1', 't2'));
})->name('admin');

Route::resource('samples', 'SampleController');

Route::resource('vehicles', 'VehicleController');

Route::resource('bookings', 'BookingController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
