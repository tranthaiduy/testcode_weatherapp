<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/weather', [WeatherController::class, 'weather'])->name('weather-form');
Route::post('/weather', [WeatherController::class, 'getWeather'])->name('get-weather');

//history
Route::get('/history', [WeatherController::class, 'history'])->name('history');

//notification
Route::get('/subscribe', [SubscriptionController::class, 'showSubscribeForm'])->name('subscribe');
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe-post');

Route::post('/unsubscribe', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');



