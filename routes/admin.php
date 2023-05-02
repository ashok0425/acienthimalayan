<?php

use Illuminate\Support\Facades\Route;

// Route::middleware('guest:admin')->group(function(){
Route::get('login', 'AuthController@index')->name('login');
Route::post('login', 'AuthController@store')->name('login');
// });

Route::get('/dashboard', 'AuthController@show')->name('dashboard');
Route::get('/profile', 'AuthController@profile')->name('profile');
Route::post('profile/update-profile', 'AuthController@update')->name('profile.update');
Route::post('profile/change-password', 'AuthController@changePassword')->name('password');
Route::get('profile/change-password', 'AuthController@getpassword')->name('password');
Route::post('profile/logout', 'AuthController@destory')->name('logout');
Route::get('profile/logout/admin', 'AuthController@destory')->name('logout');

//   destination 
Route::resource('/destinations', 'Travel\DestinationsController');
Route::get('/destinations/delete/{id}', 'Travel\DestinationsController@destroy')->name('destination.delete');

//   packages 
Route::resource('/categories-packages', 'Travel\PackagesController');
Route::get('categories-package/delete/{id}', 'Travel\PackagesController@destroy')->name('categories-packages.delete');

// testimonials
Route::resource('/testimonials', 'Testimonials\TestimonialsController');
Route::get('/testimonials/delete/{id}', 'Testimonials\TestimonialsController@destroy')->name('testimonials.delete');




// cms 
Route::resource('/cms', 'Cms\CmsController');
Route::get('/cms/delete/{id}', 'Cms\CmsController@destroy')->name('cms.delete');


//Contact
Route::resource('contacts', 'ContactController');
Route::get('/contacts/delete/{id}', 'ContactController@destroy')->name('contacts.delete');
Route::get('contacts/history', 'ContactController@emailHistory')->name('contacts.history');



// Banner 
Route::resource('/banners', 'BannerController');
Route::get('banners/delete/{id}', 'BannerController@destroy')->name('banners.delete');


// Setting 
Route::resource('/websites', 'SettingController');
Route::resource('section-control', 'Main\SectionControlController');

Route::get('active/{id}/{table}', 'BannerController@active')->name('active');
Route::get('deactive/{id}/{table}', 'BannerController@deactive')->name('deactive');

