<?php

   use Illuminate\Support\Facades\Route;


// index page 
    Route::get('/','HomeController@getIndex')->name('/');

	
	Route::get('cms/{page?}','HomeController@Page')->name('cms.page');
	Route::get('cms/page/{page}/{id?}','HomeController@PageDetail')->name('cms.detail');
	Route::get('contact','ContactController@index')->name('contactus');
	Route::post('contact','ContactController@store')->name('contactus.store');
	Route::get('destination/{id}/{url}','DestinationController@index')->name('destination');
	Route::get('package-all/','PackageController@all')->name('package.all');

	Route::get('package-destination/{id}/{url}','PackageController@destination')->name('package.destination');
	Route::get('package-category/{id}/{url}','PackageController@category')->name('package.category');
	Route::get('package-detail/{id?}/{url?}','PackageController@show')->name('package.detail');
	Route::get('book-now/{package_id?}/{date?}','BuyController@index')->name('booknow');
	Route::post('booking/step2','BuyController@step2')->name('booking.step2');
	Route::post('booking/store','BuyController@store')->name('booking.step2.store');
	Route::get('booking-online/{id}','BuyController@payonline')->name('booking.online');
	Route::post('payment-confirmation/','BuyController@Confirmation')->name('booking.confirmation');

	Route::any('pay/payment', 'BuyController@getPayment')->name('payment-from-bank');
	Route::any('pay/payment-response', 'BuyController@getPayment')->name('payment-from-bank-reponse');
	Route::any('pay-thankyou', 'BuyController@thanku')->name('pay.thanku');

	Route::get('package/print/{package}','PackageController@printpackage')->name('print');



	Route::get('load-category/{data}','DestinationController@loadCategory');
	Route::get('search-package','DestinationController@search')->name('search');
	Route::get('get-ajax-package','DestinationController@getAjaxpackage');


	Route::get('blogs','BlogController@index')->name('blog');
	Route::get('blog-detail/{id}','BlogController@show')->name('blog.detail');
	Route::post('filterBlog}','BlogController@filterBlog')->name('filterBlog');


	Route::get('events','EventController@index')->name('events');
	Route::get('event-detail/{id}','EventController@show')->name('event.detail');


	Route::post('enquery-post','ContactController@Enquery')->name('enquery.post');
	Route::get('event-detail/{id}','EventController@show')->name('event.detail');
	Route::get('departure-date','PackageController@Departure')->name('departure');


	Route::get('testimonials/{package?}','PackageController@Testimonial')->name('testimonials');
	Route::post('testimonials/store','PackageController@testimonialStore')->name('testimonials.store');


	Route::post('subscribe/store','ContactController@subscribeStore')->name('subscribe.store');
