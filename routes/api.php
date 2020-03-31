<?php

use Illuminate\Http\Request;
use \App\Http\Resources\User as UserResource;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return new UserResource($request->user());
});

Route::post('login', 'UserAPIController@login');
Route::post('signup', 'UserAPIController@signup');
Route::post('saveProfile/{id}', 'UserAPIController@saveProfile');
Route::resource('users', 'UserAPIController');

Route::resource('roles', 'RoleAPIController');

Route::resource('severities', 'SeverityAPIController');

Route::get('categories/{id}/equipment', 'CategoryAPIController@showByCategoryId');
Route::resource('categories', 'CategoryAPIController');

Route::get('tickets/{id}/user', 'TicketAPIController@userTickets');
Route::resource('tickets', 'TicketAPIController');

Route::resource('messages', 'MessageAPIController');

Route::resource('equipment', 'EquipmentAPIController');

Route::get('orders/{id}/user', 'OrderAPIController@userOrders');
Route::resource('orders', 'OrderAPIController');

Route::resource('orderdetails', 'OrderdetailAPIController');

Route::resource('telltypes', 'TelltypeAPIController');

Route::resource('factorytells', 'FactorytellAPIController');

Route::resource('factoryaddresses', 'FactoryaddressAPIController');

Route::resource('factories', 'FactoryAPIController');

Route::get('cards/{id}/user', 'CardAPIController@userCards');
Route::resource('cards', 'CardAPIController');

Route::resource('media', 'MediaAPIController');

Route::resource('organization_users', 'OrganizationUserAPIController');

Route::resource('role_users', 'RoleUserAPIController');

Route::resource('protection_categories', 'ProtectionCategoryAPIController');

Route::resource('organization_categories', 'OrganizationCategoryAPIController');

Route::resource('prefactors', 'PrefactorAPIController');



Route::resource('prefactor_details', 'PrefactorDetailAPIController');

Route::get('logs/{id}/user', 'LogAPIController@logsUser')->name('logs.api.user');
Route::get('logs', 'LogAPIController@index')->name('logs.api.index');




Route::resource('settings', 'SettingAPIController');



Route::resource('comments', 'CommentAPIController');

Route::resource('links', 'LinkAPIController');