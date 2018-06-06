<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('login', 'API\PassportController@login');
Route::post('password/forgot', 'API\PassportController@passwordForgot');
Route::post('password/otp', 'API\PassportController@verifyOTPPhone');
Route::post('password/regenerate', 'API\PassportController@resetPasswordPhone');
//Route::post('register', 'API\PassportController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('userme', 'API\PassportController@userMe');
	Route::post('userme/edit', 'API\PassportController@userEdit');
	Route::post('recentTicket', 'API\PassportController@recentTicket');
	Route::post('allTickets', 'API\PassportController@allTickets');
	Route::post('ticketDetails', 'API\PassportController@ticketDetails');
	Route::post('ticketDetails/update', 'API\PassportController@ticketUpdate');

	Route::post('allusers', 'API\PassportController@allUsers');
	Route::post('totalcases', 'API\PassportController@totalCases');
	Route::post('clientCaseDetails/{id}', 'API\PassportController@clientCaseDetails');
	Route::post('ticketDetails/statusUpdate', 'API\PassportController@ticketStatusUpdate');
	Route::post('password/change', 'API\PassportController@changePassword');
	Route::post('settings', 'API\PassportController@asfSettings');
	Route::post('create', 'API\PassportController@createCase');
	Route::post('message/create', 'API\PassportController@messageCreate');
	Route::post('message/all/{case_id}', 'API\PassportController@messageAll');
	Route::post('logout', 'API\PassportController@logout');

	Route::post('fcmtoken', 'API\PassportController@fcmTokenUpdate');


	//Route::put('edit/{id}', 'API\PassportController@caseUpdate');

});