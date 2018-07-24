<?php

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

Route::get('/', 'HomeController@index')->name('web.home');

// Module
Route::get('tours', 'HomeController@tours')->name('web.tours');

// Module Service
Route::get('services/{id}-{slug}', 'ServiceController@detail')->name('web.services.detail');

// Module Booking
Route::get('booking/step1', 'BookingController@bookingStep1')->name('web.booking.step1');

// Module
Route::get('/places/search', 'PlaceController@search')->name('places.search');

// Login Facebook
Route::get('/redirect/{social}', 'SocialAuthController@redirect')->name('redirect-social');
Route::get('/callback/{social}', 'SocialAuthController@callback')->name('callback-social');

Auth::routes();
