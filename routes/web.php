<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});

// alle Request-Methoden sind erlaubt
Route::any('/cars', 'CarController@index');

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

// id = optionales Pflichtattribut mit Defaultwert
Route::get('/cars/id/{id?}', function ($id = 0) {
    return "Car ID ".$id;
})->name('details')->where('id', '[0-9]+'); // Name muss einzigartig sein

// erlaubt nur get und post Requests
Route::match(['get', 'post'], '/services', function () {
    return "Services";
});

/*
Route::get('/services/{type}', function ($type) {
    return "Services: ".$type;
})->where('type', '[A-Za-zö]+');
*/

Route::get('/services/{type}', function ($type) {
    return "Services: ".$type;
})->where('type', 'seo|sea|sem'); // or

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
Route::view('/we', 'we');

// Route::redirect('/about', '/we', 301);
Route::permanentRedirect('/about', '/we');


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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/admin', function () {
    return view('admin');
});