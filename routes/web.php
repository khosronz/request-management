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

Route::get('/', 'WelcomeController@index');


Auth::routes(['verify' => true]);

Route::get('/superadmin', 'HomeController@superadminindex')->name('superadmin.index');
Route::get('/master', 'HomeController@masterindex')->name('master.index');
Route::get('/successor', 'HomeController@successorindex')->name('successor.index');
Route::get('/owner/create', 'HomeController@ownercreate')->name('owner.create');
Route::get('/owner', 'HomeController@ownerindex')->name('owner.index');
Route::get('/protection', 'HomeController@protectionindex')->name('protection.index');
Route::get('/financial', 'HomeController@financialindex')->name('financial.index');
Route::get('/support', 'HomeController@supportindex')->name('support.index');
Route::get('/supplier', 'HomeController@supplierindex')->name('supplier.index');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('organizations', 'OrganizationController');

Route::resource('roles', 'RoleController');

Route::resource('severities', 'SeverityController');

Route::get('products/{id}/attributes', 'ProductController@attributes')->name('products.attributes');

Route::get('categories/{id}/showproducts', 'CategoryController@showproducts')->name('categories.showproducts');
Route::resource('categories', 'CategoryController');

Route::resource('tickets', 'TicketController');

Route::resource('messages', 'MessageController');


Route::resource('equipment', 'EquipmentController');

Route::delete('orders/{id}/block', 'OrderController@block')->name('orders.block');
Route::delete('orders/{id}/success', 'OrderController@success')->name('orders.success');
Route::get('orders/{id}/blockGet', 'OrderController@blockGet')->name('orders.block.get');
Route::get('orders/{id}/successGet', 'OrderController@successGet')->name('orders.success.get');
Route::get('orders/convertCardOrder', 'OrderController@convertCardOrder')->name('orders.convertCardOrder');
Route::resource('orders', 'OrderController');

Route::resource('orderdetails', 'OrderdetailController');

Route::resource('telltypes', 'TelltypeController');

Route::resource('factorytells', 'FactorytellController');

Route::resource('factoryaddresses', 'FactoryaddressController');

Route::resource('factories', 'FactoryController');

Route::resource('cards', 'CardController');

Route::resource('media', 'MediaController');

//Route::post('processupload',function (Request $request){
//    $path=$request->file('photo')->store('photos');
//    dd($path);
//});

Route::patch('users/{id}/updatePassword', 'UserController@updatePassword')->name('users.updatePassword');
Route::resource('users', 'UserController');
Route::resource('organizationUsers', 'OrganizationUserController');


Route::resource('roleUsers', 'RoleUserController');

Route::resource('protectionCategories', 'ProtectionCategoryController');

Route::resource('organizationCategories', 'OrganizationCategoryController');

Route::get('prefactors/{id}/success', 'PrefactorController@success')->name('prefactors.success');;
Route::get('prefactors/factorIndex', 'PrefactorController@factorIndex')->name('prefactors.factorIndex');;
Route::get('prefactors/{id}/createByOrder', 'PrefactorController@createByOrder')->name('prefactors.createByOrder');
Route::resource('prefactors', 'PrefactorController');



Route::resource('prefactorDetails', 'PrefactorDetailController');

Route::get('logs/{id}/user', 'LogController@logsUser')->name('logs.user');
Route::get('logs/sessions', 'LogController@logSessions')->name('logs.sessions');
Route::get('logs', 'LogController@index')->name('logs.index');




Route::resource('settings', 'SettingController');