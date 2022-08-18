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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/vehicles', Response::HTTP_MOVED_PERMANENTLY);

Route::resources([
//    'cars' => 'CarController',
    'users' => 'UserController'
]);

Route::get('/services', function () {
    return view('services');
})
->name('services');

Route::view('/we', 'we', ['page' => 'we'])
    ->name('we');

Route::redirect('/about', '/we', Response::HTTP_MOVED_PERMANENTLY);

Route::get('/contact', 'ContactController@form')->name('contact');
Route::post('/contact', 'ContactController@submit');

Route::middleware('can:isAdmin')->group(function() {
    Route::get('/admin', function () {
        return view('admin');        
    })->name('admin');
});

Route::resource('vehicles', 'VehicleController');

Route::group(['middleware' => ['auth']], function() {

    Route::resource('bookings', 'BookingController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
