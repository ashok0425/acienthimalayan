<?php
use Illuminate\Support\Facades\Route;

// Route::middleware('guest:admin')->group(function(){
    Route::get('login','AuthController@index')->name('login');
    Route::post('login','AuthController@store')->name('login');
// });

  Route::get('/dashboard','AuthController@show')->name('dashboard');
  Route::get('/profile','AuthController@profile')->name('profile');
  Route::post('profile/update-profile','AuthController@update')->name('profile.update');
  Route::post('profile/change-password','AuthController@changePassword')->name('password');
  Route::get('profile/change-password','AuthController@getpassword')->name('password');
  Route::post('profile/logout','AuthController@destory')->name('logout');
  Route::get('profile/logout/admin','AuthController@destory')->name('logout');
	
//   destination 
  Route::resource('/destinations', 'Travel\DestinationsController');
  Route::get('/destinations/delete/{id}', 'Travel\DestinationsController@destroy')->name('destination.delete');

//   destination category 
  Route::resource('/categories-destinations', 'Travel\CategoriesDestinationsController');
  Route::get('/categoriesdestinations/delete/{id}', 'Travel\CategoriesDestinationsController@destroy')->name('categories-destinations.delete');


//    category Region
  Route::resource('/categories-places', 'Travel\CategoriesPlacesController');
  Route::get('/categories-places/delete/{id}', 'Travel\CategoriesPlacesController@destroy')->name('categories-places.delete');

//   packages 
	Route::resource('/categories-packages', 'Travel\PackagesController');
	Route::get('categories-package/delete/{id}', 'Travel\CategoriesPlacesController@destroy')->name('categories-packages.delete');

	// testimonials
	Route::resource('/testimonials', 'Testimonials\TestimonialsController');
	Route::get('/testimonials/delete/{id}', 'Testimonials\TestimonialsController@destroy')->name('testimonials.delete');
	
	// Faq 
	Route::resource('faqs', 'Travel\FaqsController');
	Route::get('faq/delete/{id}', 'Travel\FaqsController@destroy')->name('faqs.delete');

     //depatures
	Route::resource('/departures', 'Travel\DeparturesController');
	Route::get('/departures/delete/{id}', 'Travel\DeparturesController@destroy')->name('departures.delete');

		//blog 
		Route::resource('/blogs', 'BlogController');
		Route::get('/blogs/delete/{id}', 'BlogController@destroy')->name('blogs.delete');



	//Event 
	Route::resource('/events', 'EventController');
	Route::get('/events/delete/{id}', 'EventController@destroy')->name('events.delete');





	// cms 
	Route::resource('/cms', 'Cms\CmsController');
	Route::get('/cms/delete/{id}', 'Cms\CmsController@destroy')->name('cms.delete');

	 //Newletter
	Route::resource('newsletters', 'Newsletter\NewsletterController');
	Route::get('/newsletters/delete/{id}', 'Newsletter\NewsletterController@destroy')->name('newsletters.delete');
	Route::get('newsletters/history', 'Newsletter\NewsletterController@emailHistory')->name('newsletters.history');

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

// Role and permission
Route::get('/role_permission','RoleController@index')->name('role');
Route::get('/role_permission/create','RoleController@create')->name('role.create');
Route::post('/role_permission/store','RoleController@store')->name('role.store');
Route::get('/role_permission/edit/{id}','RoleController@edit')->name('role.edit');
Route::post('/role_permission/update','RoleController@update')->name('role.update');
Route::get('/role_permission/delete/{id}/{table}','RoleController@destroy')->name('role.delete');

// Assign
Route::get('role_permission/assign_role','AssignroleController@index')->name('assignrole');
Route::get('role_permission/assign_role/create','AssignroleController@create')->name('assignrole.create');
Route::post('role_permission/assign_role/store','AssignroleController@store')->name('assignrole.store');
Route::get('role_permission/assign_role/edit/{id}','AssignroleController@edit')->name('assignrole.edit');
Route::post('role_permission/assign_role/update','AssignroleController@update')->name('assignrole.update');
Route::get('role_permission/assign_role/delete/{id}/{table}','AssignroleController@destroy')->name('assignrole.delete');






Route::resource('contact-details','Main\ContactDetailsController');
Route::resource('important-links','ImportantLinks\ImportantLinksController');

Route::resource('/main-slider', 'Main\MainSliderController');
Route::resource('/blog', 'Blog\BlogController');
Route::resource('videos','Main\VideosController', array('only' => array('update')));

Route::get('booking','Main\MainController@getBooking');
Route::get('booking/{id}','Main\MainController@BookingDetail')->name('bookingdetail');