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
Route::post('saveProfile/{id}', 'UserAPIController@saveProfile')->middleware('auth:api');
Route::resource('users', 'UserAPIController')->middleware('auth:api');

Route::resource('roles', 'RoleAPIController')->middleware('auth:api');

Route::resource('severities', 'SeverityAPIController')->middleware('auth:api');

Route::get('categories/{id}/equipment', 'CategoryAPIController@showByCategoryId')->middleware('auth:api');
Route::resource('categories', 'CategoryAPIController')->middleware('auth:api');

Route::get('tickets/{id}/user', 'TicketAPIController@userTickets')->middleware('auth:api');
Route::resource('tickets', 'TicketAPIController')->middleware('auth:api');

Route::resource('messages', 'MessageAPIController')->middleware('auth:api');

Route::resource('equipment', 'EquipmentAPIController')->middleware('auth:api');

Route::get('orders/{id}/user', 'OrderAPIController@userOrders')->middleware('auth:api');
Route::resource('orders', 'OrderAPIController')->middleware('auth:api');

Route::resource('orderdetails', 'OrderdetailAPIController')->middleware('auth:api');

Route::resource('telltypes', 'TelltypeAPIController')->middleware('auth:api');

Route::resource('factorytells', 'FactorytellAPIController')->middleware('auth:api');

Route::resource('factoryaddresses', 'FactoryaddressAPIController')->middleware('auth:api');

Route::resource('factories', 'FactoryAPIController')->middleware('auth:api');

Route::get('cards/{id}/user', 'CardAPIController@userCards')->middleware('auth:api');
Route::resource('cards', 'CardAPIController')->middleware('auth:api');

Route::resource('media', 'MediaAPIController')->middleware('auth:api');

Route::resource('organization_users', 'OrganizationUserAPIController')->middleware('auth:api');

Route::resource('role_users', 'RoleUserAPIController')->middleware('auth:api');

Route::resource('protection_categories', 'ProtectionCategoryAPIController')->middleware('auth:api');

Route::resource('organization_categories', 'OrganizationCategoryAPIController')->middleware('auth:api');

Route::resource('prefactors', 'PrefactorAPIController')->middleware('auth:api');



Route::resource('prefactor_details', 'PrefactorDetailAPIController')->middleware('auth:api');

Route::get('logs/{id}/user', 'LogAPIController@logsUser')->name('logs.api.user')->middleware('auth:api');
Route::get('logs', 'LogAPIController@index')->name('logs.api.index')->middleware('auth:api');
