<?php


Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');

Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');


Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Route::post('/register/admin', 'Auth\RegisterController@createAdmin');


Route::view('/home', 'home')->middleware('auth');




//Route::view('/admin', 'admin');

//ADMIN ROUTES

//Route::prefix('admin')->group(function(){
//    });

Route::get('/admin', 'AdminController@index')->name('admin.index');

// Services

Route::get('/admin/services', 'AdminServicesController@index')->name('admin.services.index');
Route::get('/admin/services/create', 'AdminServicesController@create')->name('admin.services.create');
Route::post('/admin/services', 'AdminServicesController@store')->name('admin.services.store');
Route::get('/admin/services/edit/{id}','AdminServicesController@edit')->name('admin.services.edit');
Route::put('/admin/services/{id}','AdminServicesController@update')->name('admin.services.update');


//dashboard

Route::get('dashboard','DashboardController@index')->name('dashboard');
Route::post('/dashboard/checkdbupdate','DashboardController@checkdbupdate')->name('dashboard.checkdbupdate');
Route::post('/dashboard/updateplaysound','DashboardController@updateplaysound')->name('dashboard.updateplaysound');

// users

Route::get('/admin/users', 'AdminUsersController@index')->name('admin.users.index');
Route::get('/admin/users/create', 'AdminUsersController@create')->name('admin.users.create');
Route::post('/admin/users', 'AdminUsersController@store')->name('admin.users.store');
Route::get('/admin/users/edit/{id}','AdminUsersController@edit')->name('admin.users.edit');
Route::put('/admin/users/{id}','AdminUsersController@update')->name('admin.users.update');
Route::get('/admin/users/addservice/{id}','AdminUsersController@addservice')->name('admin.users.addservice');
Route::post('/admin/users/addservice','AdminUsersController@storeaddservice')->name('admin.users.storeaddservice');

// locations
Route::get('/admin/locations', 'AdminLocationsController@index')->name('admin.locations.index');
Route::get('/admin/locations/create', 'AdminLocationsController@create')->name('admin.locations.create');
Route::post('/admin/locations', 'AdminLocationsController@store')->name('admin.locations.store');
Route::get('/admin/locations/edit/{id}','AdminLocationsController@edit')->name('admin.locations.edit');
Route::put('/admin/locations/{id}','AdminLocationsController@update')->name('admin.locations.update');

// Offices

Route::get('/admin/offices', 'AdminOfficesController@index')->name('admin.offices.index');
Route::get('/admin/offices/create', 'AdminOfficesController@create')->name('admin.offices.create');
Route::post('/admin/offices', 'AdminOfficesController@store')->name('admin.offices.store');
Route::get('/admin/offices/edit/{id}','AdminOfficesController@edit')->name('admin.offices.edit');
Route::put('/admin/offices/{id}','AdminOfficesController@update')->name('admin.offices.update');

// Advertisements
Route::get('/admin/ads', 'AdminAdsController@index')->name('admin.ads.index');
Route::get('/admin/ads/create', 'AdminAdsController@create')->name('admin.ads.create');
Route::post('/admin/ads', 'AdminAdsController@store')->name('admin.ads.store');
Route::get('/admin/ads/edit/{id}','AdminAdsController@edit')->name('admin.ads.edit');
Route::put('/admin/ads/{id}','AdminAdsController@update')->name('admin.ads.update');

//prints
Route::get('/admin/prints/daily', 'AdminPrintsController@dailyindex')->name('admin.prints.daily.index');
Route::post('/admin/prints/searchDaily', 'AdminPrintsController@dailysearch')->name('admin.prints.daily.search');
Route::post('/admin/prints/printDaily', 'AdminPrintsController@dailyprint')->name('admin.prints.daily.print');

Route::get('/admin/prints/monthly', 'AdminPrintsController@monthlyindex')->name('admin.prints.monthly.index');
Route::post('/admin/prints/searchmonthly', 'AdminPrintsController@monthlysearch')->name('admin.prints.monthly.search');
Route::post('/admin/prints/printmonthly', 'AdminPrintsController@monthlyprint')->name('admin.prints.monthly.print');

Route::get('/admin/prints/range', 'AdminPrintsController@rangeindex')->name('admin.prints.range.index');
Route::post('/admin/prints/searchrange', 'AdminPrintsController@rangesearch')->name('admin.prints.range.search');
Route::post('/admin/prints/printrange', 'AdminPrintsController@rangeprint')->name('admin.prints.range.print');


//EMPLOYEE ROUTES

Route::get('/employee', 'EmployeeController@index')->name('employee.index');
Route::get('/employee/servedclients', 'EmployeeController@servedClient')->name('employee.served');
Route::get('/employee/servedclientstoday', 'EmployeeController@servedClientToday')->name('employee.servedtoday');
Route::get('/employee/pendingclients', 'EmployeeController@pendingClient')->name('employee.pending');

//javascript
Route::post('/employee/updateclient','ClientsController@updateclient')->name('client.updateclient');
Route::post('/employee/updatestatusclient','ClientsController@updateservedclient')->name('client.updateservedclient');
Route::post('/employee/updateserve','ClientsController@updateserve')->name('client.updateserve');
//Route::post('/employee/updateserving','ClientsController@updateserving')->name('client.updateserving');

//Services

Route::get('/employee/services', 'EmployeeServicesController@index')->name('employee.services.index');
Route::get('/employee/services/create', 'EmployeeServicesController@create')->name('employee.services.create');
Route::post('/employee/services', 'EmployeeServicesController@store')->name('employee.services.store');
Route::get('/employee/services/edit/{id}','EmployeeServicesController@edit')->name('employee.services.edit');
Route::put('/employee/services/{id}','EmployeeServicesController@update')->name('employee.services.update');


//CLIENT

Route::get('/client', 'ClientsController@index')->name('client.index');
Route::get('/client/second', 'ClientsController@second')->name('client.second');

Route::get('/client/offices', 'ClientsController@office')->name('client.byoffice');
Route::get('/client/byoffice/{id}', 'ClientsController@showByOffice')->name('client.showbyoffice');
Route::get('/client/create/{id}', 'ClientsController@create')->name('client.create');
//Route::post('/client/{id}', 'ClientsController@store')->name('client.store'laotr);
Route::post('/client', 'ClientsController@storeClient')->name('client.storeclient');

Route::get('/client/print/{id}/{service}','ClientsController@printPriority')->name('client.printpriority');

