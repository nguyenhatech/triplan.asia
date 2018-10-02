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

Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'web' ]
    ], function($language){
    // Thay đổi ngôn ngữ hệ thống
    // Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('web.change-language');

    Route::get('/', 'HomeController@index')->name('web.home');

    // Module
    Route::get('du-lich-{slug}', 'PlaceController@show')->name('web.show_place');

    // Module Service
    Route::get('{slug}_{uuid}', 'ServiceController@detail')->name('web.services.detail');

    // Module Booking
    Route::get('booking/step1', 'BookingController@bookingStep1')->name('web.booking.step1');
    Route::get('booking/thankyou', 'BookingController@thankyou')->name('web.booking.thankyou');

    // Module
    Route::get('/search-places', 'PlaceController@search')->name('places.search');
    Route::get('/kham-pha-vietnam', 'PlaceController@vietnam')->name('places.vietnam');
    Route::get('/kham-pha-the-gioi', 'PlaceController@international')->name('places.international');
    Route::get('/kham-pha-resort', 'PlaceController@resort')->name('places.resort');

    // Điểu khoản & chính sách
    Route::get('/privacy', 'PageController@privacy')->name('privacy');
    Route::get('/policies', 'PageController@policies')->name('policies');

    Route::get('/js/lang.js', function () {
        $lang = \App::getLocale();
        $text = file_get_contents(resource_path('lang/' . $lang . '.json'));
        return response()->json(json_decode($text));
    })->name('assets.lang');

    Route::group(['middleware' => 'auth'], function(){
        Route::get('dashbroad', 'AccountController@dashbroad')->name('web.dashbroad');
        Route::get('bookings', 'AccountController@bookings')->name('web.profile.bookings');
        Route::get('wishlist', 'AccountController@wishlist')->name('web.profile.wishlist');
        Route::post('profile', 'AccountController@update')->name('web.profile.update');
    });

    // Module Cart
    Route::get('/gio-hang', 'CartController@index')->name('web.cart.index');
    Route::get('/gio-hang/add-cart/{service_id}', 'CartController@addCart')->name('web.cart.add-cart');
    Route::post('/gio-hang/add-cart-real-time', 'CartController@addCartRealTime')->name('web.cart.add-cart-real-time');
    Route::get('/gio-hang/delete-one-cart/{service_id}', 'CartController@deleteOneCart')->name('web.cart.delete-one-cart');

    Route::get('/resorts/{id}', 'ResortController@show')->name('resorts.show');

    Auth::routes();
});

// Login Facebook
Route::get('/redirect/{social}', 'SocialAuthController@redirect')->name('redirect-social');
Route::get('/callback/{social}', 'SocialAuthController@callback')->name('callback-social');
