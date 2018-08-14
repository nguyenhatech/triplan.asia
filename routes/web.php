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

Route::group(['middleware' => 'locale'], function() {
    // Thay đổi ngôn ngữ hệ thống
    Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('web.change-language');

    Route::get('/', 'HomeController@index')->name('web.home');

    // Module
    Route::get('places/{slug}', 'PlaceController@show')->name('web.show_place');

    // Module Service
    Route::get('services/{id}-{slug}', 'ServiceController@detail')->name('web.services.detail');

    // Module Booking
    Route::get('booking/step1', 'BookingController@bookingStep1')->name('web.booking.step1');
    Route::get('booking/thankyou', 'BookingController@thankyou')->name('web.booking.thankyou');

    // Module
    Route::get('/search-places', 'PlaceController@search')->name('places.search');

    // Login Facebook
    Route::get('/redirect/{social}', 'SocialAuthController@redirect')->name('redirect-social');
    Route::get('/callback/{social}', 'SocialAuthController@callback')->name('callback-social');

    Auth::routes();
});

Route::get('/privacy', 'PageController@privacy')->name('privacy');
Route::get('/policies', 'PageController@policies')->name('policies');
