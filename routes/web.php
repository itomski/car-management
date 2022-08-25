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

Route::get('vehicles/test-api', 'VehicleController@testApi');

Route::resource('vehicles', 'VehicleController');

Route::get('/bookings/newsletter', 'BookingController@newsletter')->name('newsletter');

Route::group(['middleware' => ['auth', 'aDate:true', 'bisDann']], function() {
    Route::resource('bookings', 'BookingController');
    Route::resource('profile', 'ProfileController')->only(['index', 'store']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Prüfung der Policy auf der Ebene der Routs
// Route::get('/contact', 'ContactController@form')
//      ->middleware('can:viewAny,\App\Vehicle')
//      ->name('contact');

Route::get('/paypal/test', 'PayPalController@index');
Route::get('/paypal/checkout', 'PayPalController@checkout')->name('paypal.checkout');
Route::get('/paypal/checkout-success', 'PayPalController@checkoutSuccess');
Route::post('/paypal/notify', 'PayPalController@notify');
