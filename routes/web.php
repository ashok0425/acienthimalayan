<?php

   use Illuminate\Support\Facades\Route;


// index page 
    Route::get('/','HomeController@getIndex')->name('/');
    Route::get('/about','HomeController@about')->name('about');
    Route::get('/packages','HomeController@packages')->name('packages');
    Route::get('/package/{id}','HomeController@packageDetail')->name('package.detail');
    Route::get('/contact','HomeController@contact')->name('contact');
    Route::post('/contact/store','HomeController@contactStore')->name('contact.store');
	Route::post('subscribe/store','ContactController@subscribeStore')->name('subscribe.store');
    Route::get('/search','HomeController@search')->name('search');
