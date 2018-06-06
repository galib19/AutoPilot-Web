<?php

use App\Http\Controllers\Controller;
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

// Route::get('/', function () {
//     return view('home');
// });




Auth::routes();

// Route::get('password/forgot','Auth\ForgotPasswordController@showForgotPasswordForm')->name('password.forgot');

Route::get('password/forgot', [
   'uses' => 'Auth\ForgotPasswordController@showForgotPasswordForm',
   'as' => 'password.forgot'
]);


Route::post('password/forgot', [
   'uses' => 'Auth\ForgotPasswordController@sendResetOTPPhone',
   'as' => 'password.phone'
]);

Route::post('password/otp', [
   'uses' => 'Auth\ForgotPasswordController@verifyOTPPhone',
   'as' => 'password.otp'
]);

Route::post('password/regenerate', [
   'uses' => 'Auth\ForgotPasswordController@resetPasswordPhone',
   'as' => 'password.regenerate'
]);


Route::get('/', 'Backend\HomeController@index')->name('home');

Route::get('/home', 'Backend\HomeController@index')->name('home');

Route::get('import-export-csv-excel',array('as'=>'excel.import','uses'=>'FileController@importExportExcelORCSV'));
Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as'=>'excel-file','uses'=>'FileController@downloadExcelFile'));


Route::group( ['prefix' => 'backend', 'as' => 'backend.', 'namespace' => 'Backend'], function () {

   
	// Case Route
    Route::resource('ticket','TicketController');

    // users Route
    Route::resource('user','UsersController');


    // Route::get('settings', function () {
    //     return view('backend/settings');
    // });


    // Settings Route
    Route::any('settings', 'SettingsController@index')->name('settings');


    // ticket change status
    Route::post('ticket/changestatus/{id}', 'TicketController@TicketChangeStatus')->name('ticket.change.status');
    Route::post('ticket/changestatusmanager/{id}', 'TicketController@TicketChangeStatusManager')->name('ticket.change.statusmanager');

    
  
});

