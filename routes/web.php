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

// Transaction types

Route::get('/admin/transactiontypes', 'AdminTransactiontypesController@index')->name('admin.transactiontypes.index');
Route::get('/admin/transactiontypes/create', 'AdminTransactiontypesController@create')->name('admin.transactiontypes.create');
Route::post('/admin/transactiontypes', 'AdminTransactiontypesController@store')->name('admin.transactiontypes.store');
Route::get('/admin/transactiontypes/edit/{id}','AdminTransactiontypesController@edit')->name('admin.transactiontypes.edit');
Route::put('/admin/transactiontypes/{id}','AdminTransactiontypesController@update')->name('admin.transactiontypes.update');



// Classifications

Route::get('/admin/classifications', 'AdminClassificationsController@index')->name('admin.classifications.index');
Route::get('/admin/classifications/create', 'AdminClassificationsController@create')->name('admin.classifications.create');
Route::post('/admin/classifications', 'AdminClassificationsController@store')->name('admin.classifications.store');
Route::get('/admin/classifications/edit/{id}','AdminClassificationsController@edit')->name('admin.classifications.edit');
Route::put('/admin/classifications/{id}','AdminClassificationsController@update')->name('admin.classifications.update');

// Services

Route::get('/admin/services', 'AdminServicesController@index')->name('admin.services.index');
Route::get('/admin/services/create', 'AdminServicesController@create')->name('admin.services.create');
Route::post('/admin/services', 'AdminServicesController@store')->name('admin.services.store');
Route::get('/admin/services/edit/{id}','AdminServicesController@edit')->name('admin.services.edit');
Route::put('/admin/services/{id}','AdminServicesController@update')->name('admin.services.update');
Route::get('/admin/services/show/{id}','AdminServicesController@show')->name('admin.services.show');

        //transaction types
Route::get('/admin/services/transactiontypes/{id}', 'AdminServicesController@transtypeindex')->name('admin.services.transactiontypes.index');
Route::get('/admin/services/transactiontypes/add/{id}', 'AdminServicesController@addtrans')->name('admin.services.transactiontypes.add');
Route::get('/admin/services/transactiontypes/edit/{id}', 'AdminServicesController@edittrans')->name('admin.services.transactiontypes.edit');
Route::post('/admin/services/transactiontypes', 'AdminServicesController@storetrans')->name('admin.services.transactiontypes.storetrans');
Route::put('/admin/services/transactiontypes/{id}', 'AdminServicesController@updatetrans')->name('admin.services.transactiontypes.updatetrans');
Route::get('/admin/services/transactiontypes/delete/{id}', 'AdminServicesController@deletetrans')->name('admin.services.transactiontypes.deletetrans');

        //file attachments
Route::get('/admin/services/files/{id}', 'AdminServicesController@filesindex')->name('admin.services.files.index');
Route::get('/admin/services/files/add/{id}', 'AdminServicesController@addfiles')->name('admin.services.files.add');
Route::get('/admin/services/files/edit/{id}', 'AdminServicesController@editfiles')->name('admin.services.files.edit');
Route::post('/admin/services/files', 'AdminServicesController@storefiles')->name('admin.services.files.storefiles');
Route::put('/admin/services/files/{id}', 'AdminServicesController@updatefiles')->name('admin.services.files.updatefiles');
Route::get('/admin/services/files/delete/{id}', 'AdminServicesController@deletefiles')->name('admin.services.files.deletefiles');


        //requirements
Route::get('/admin/services/requirements/{id}', 'AdminServicesController@requirementsindex')->name('admin.services.requirements.index');
Route::get('/admin/services/requirements/add/{id}', 'AdminServicesController@addrequirements')->name('admin.services.requirements.add');
Route::get('/admin/services/requirements/edit/{id}', 'AdminServicesController@editrequirements')->name('admin.services.requirements.edit');
Route::post('/admin/services/requirements', 'AdminServicesController@storerequirement')->name('admin.services.requirements.storerequirement');
Route::put('/admin/services/requirements/{id}', 'AdminServicesController@updaterequirement')->name('admin.services.requirements.updaterequirement');
Route::get('/admin/services/requirements/delete/{id}', 'AdminServicesController@deleterequirement')->name('admin.services.requirements.deleterequirement');

        //steps
Route::get('/admin/services/steps/{id}', 'AdminServicesController@stepsindex')->name('admin.services.steps.index');
Route::get('/admin/services/steps/add/{id}', 'AdminServicesController@addsteps')->name('admin.services.steps.add');
Route::get('/admin/services/steps/edit/{id}', 'AdminServicesController@editsteps')->name('admin.services.steps.edit');
Route::post('/admin/services/steps', 'AdminServicesController@storestep')->name('admin.services.steps.storestep');
Route::put('/admin/services/steps/{id}', 'AdminServicesController@updatestep')->name('admin.services.steps.updatestep');
Route::get('/admin/services/steps/delete/{id}', 'AdminServicesController@deletestep')->name('admin.services.steps.deletestep');

                //Agency actions

Route::get('/admin/services/steps/agencyactions/{id}', 'AdminServicesController@agencyactionindex')->name('admin.services.steps.agencyactions.index');
Route::get('/admin/services/steps/agencyactions/add/{id}', 'AdminServicesController@addagencyaction')->name('admin.services.steps.agencyactions.add');
Route::get('/admin/services/steps/agencyactions/edit/{id}', 'AdminServicesController@editagencyaction')->name('admin.services.steps.agencyactions.edit');
Route::post('/admin/services/steps/agencyactions', 'AdminServicesController@storeagencyaction')->name('admin.services.steps.agencyactions.storeagencyaction');
Route::put('/admin/services/steps/agencyactions/{id}', 'AdminServicesController@updateagencyaction')->name('admin.services.steps.agencyactions.updateagencyaction');
Route::get('/admin/services/steps/agencyactions/delete/{id}', 'AdminServicesController@deleteagencyaction')->name('admin.services.steps.agencyactions.deleteagencyaction');


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


    //userservice
Route::get('/admin/users/service/{id}', 'AdminUsersController@userserviceindex')->name('admin.users.services.index');
Route::get('/admin/users/service/edit/{id}', 'AdminUsersController@userserviceedit')->name('admin.users.services.edit');
Route::put('/admin/users/service/{id}','AdminUsersController@userserviceupdate')->name('admin.users.services.update');
Route::get('/admin/users/service/delete/{id}','AdminUsersController@deleteuserservices')->name('admin.users.services.delete');


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
Route::get('/employee/services/edit/{id}/{service_id}','EmployeeServicesController@edit')->name('employee.services.edit');
Route::put('/employee/services/{service_id}','EmployeeServicesController@update')->name('employee.services.update');
Route::get('/employee/services/show/{service_id}','EmployeeServicesController@show')->name('employee.services.show');

//requirements
Route::get('/employee/services/requirements/{id}', 'EmployeeServicesController@requirementsindex')->name('employee.services.requirements.index');
Route::get('/employee/services/requirements/add/{id}', 'EmployeeServicesController@addrequirements')->name('employee.services.requirements.add');
Route::get('/employee/services/requirements/edit/{id}', 'EmployeeServicesController@editrequirements')->name('employee.services.requirements.edit');
Route::post('/employee/services/requirements', 'EmployeeServicesController@storerequirement')->name('employee.services.requirements.storerequirement');
Route::put('/employee/services/requirements/{id}', 'EmployeeServicesController@updaterequirement')->name('employee.services.requirements.updaterequirement');
Route::get('/employee/services/requirements/delete/{id}', 'EmployeeServicesController@deleterequirement')->name('employee.services.requirements.deleterequirement');

//transaction types
Route::get('/employee/services/transactiontypes/{id}', 'EmployeeServicesController@transtypeindex')->name('employee.services.transactiontypes.index');
Route::get('/employee/services/transactiontypes/add/{id}', 'EmployeeServicesController@addtrans')->name('employee.services.transactiontypes.add');
Route::get('/employee/services/transactiontypes/edit/{id}', 'EmployeeServicesController@edittrans')->name('employee.services.transactiontypes.edit');
Route::post('/employee/services/transactiontypes', 'EmployeeServicesController@storetrans')->name('employee.services.transactiontypes.storetrans');
Route::put('/employee/services/transactiontypes/{id}', 'EmployeeServicesController@updatetrans')->name('employee.services.transactiontypes.updatetrans');
Route::get('/employee/services/transactiontypes/delete/{id}', 'EmployeeServicesController@deletetrans')->name('employee.services.transactiontypes.deletetrans');

//steps
Route::get('/employee/services/steps/{id}', 'EmployeeServicesController@stepsindex')->name('employee.services.steps.index');
Route::get('/employee/services/steps/add/{id}', 'EmployeeServicesController@addsteps')->name('employee.services.steps.add');
Route::get('/employee/services/steps/edit/{id}', 'EmployeeServicesController@editsteps')->name('employee.services.steps.edit');
Route::post('/employee/services/steps', 'EmployeeServicesController@storestep')->name('employee.services.steps.storestep');
Route::put('/employee/services/steps/{id}', 'EmployeeServicesController@updatestep')->name('employee.services.steps.updatestep');
Route::get('/employee/services/steps/delete/{id}', 'EmployeeServicesController@deletestep')->name('employee.services.steps.deletestep');

//file attachments
Route::get('/employee/services/files/{id}', 'EmployeeServicesController@filesindex')->name('employee.services.files.index');
Route::get('/employee/services/files/add/{id}', 'EmployeeServicesController@addfiles')->name('employee.services.files.add');
Route::get('/employee/services/files/edit/{id}', 'EmployeeServicesController@editfiles')->name('employee.services.files.edit');
Route::post('/employee/services/files', 'EmployeeServicesController@storefiles')->name('employee.services.files.storefiles');
Route::put('/employee/services/files/{id}', 'EmployeeServicesController@updatefiles')->name('employee.services.files.updatefiles');
Route::get('/employee/services/files/delete/{id}', 'EmployeeServicesController@deletefiles')->name('employee.services.files.deletefiles');

//Agency actions

Route::get('/employee/services/steps/agencyactions/{id}', 'EmployeeServicesController@agencyactionindex')->name('employee.services.steps.agencyactions.index');
Route::get('/employee/services/steps/agencyactions/add/{id}', 'EmployeeServicesController@addagencyaction')->name('employee.services.steps.agencyactions.add');
Route::get('/employee/services/steps/agencyactions/edit/{id}', 'EmployeeServicesController@editagencyaction')->name('employee.services.steps.agencyactions.edit');
Route::post('/employee/services/steps/agencyactions', 'EmployeeServicesController@storeagencyaction')->name('employee.services.steps.agencyactions.storeagencyaction');
Route::put('/employee/services/steps/agencyactions/{id}', 'EmployeeServicesController@updateagencyaction')->name('employee.services.steps.agencyactions.updateagencyaction');
Route::get('/employee/services/steps/agencyactions/delete/{id}', 'EmployeeServicesController@deleteagencyaction')->name('employee.services.steps.agencyactions.deleteagencyaction');


//CLIENT

Route::get('/client', 'ClientsController@index')->name('client.index');
Route::get('/client/second', 'ClientsController@second')->name('client.second');

Route::get('/client/offices', 'ClientsController@office')->name('client.byoffice');
Route::get('/client/byoffice/{id}', 'ClientsController@showByOffice')->name('client.showbyoffice');
Route::get('/client/create/{id}', 'ClientsController@create')->name('client.create');
//Route::post('/client/{id}', 'ClientsController@store')->name('client.store'laotr);
Route::post('/client', 'ClientsController@storeClient')->name('client.storeclient');

Route::get('/client/prints/{id}/{service}','ClientsController@printPriority')->name('client.printpriority');

