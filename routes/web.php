<?php

Route::view('/', 'home');
Route::get('/hotels', 'HotelController@index');
Route::get('/auth0/callback', '\Auth0\Login\Auth0Controller@callback' )->name('auth0-callback');
Route::get('/login', 'Auth\Auth0IndexController@login')->name('login');
Route::get('/logout', 'Auth\Auth0IndexController@logout')->name('logout')->middleware('auth');

Route::group(['prefix' => 'dashboard'], function() {
    Route::view('/', 'dashboard/dashboard');
    Route::get('reservations/create/{id}', 'ReservationController@create');
    Route::resource('reservations', 'ReservationController')->except('create');
});
