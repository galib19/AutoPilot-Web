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


Route::group( ['prefix' => 'backend', 'as' => 'backend.', 'namespace' => 'Backend'], function () {

    // Route::group(['as' => 'user.'], function(){

    //     Route::get('custom', [
    //         'as' => 'custom',
    //         'uses' => 'UserController@custom'
    //     ]);     

    //     // Results in backend.user.custom

    // }); 

	// Case Route
    Route::resource('case','CaseIncedentController');

    // users Route
    Route::resource('user','UsersController');


    // Route::get('settings', function () {
    //     return view('backend/settings');
    // });


    // Settings Route
    Route::any('settings', 'SettingsController@index')->name('settings');


    // Helpdesk team
    Route::post('case/updatehd/{id}', 'CaseIncedentController@CaseInfoUpdateHd')->name('case.updatehd');
    Route::post('case/updateadmin/{id}', 'CaseIncedentController@CaseInfoUpdateAdmin')->name('case.updateadmin');
    Route::post('case/updateff/{id}', 'CaseIncedentController@CaseInfoUpdateFF')->name('case.updateff');

    Route::post('case/message/create/{id}', 'CaseIncedentController@CaseMessageCreate')->name('case.message.create');

    // case change status
    Route::post('case/changestatus/{id}', 'CaseIncedentController@CaseChangeStatus')->name('case.change.status');
    Route::post('case/changestatusmanager/{id}', 'CaseIncedentController@CaseChangeStatusManager')->name('case.change.statusmanager');


  
});






// Route::get('/sparkpost', function() {

//   Mail::send('emails.test', [], function($message) {
//     $message
//     	->from('from@yourdomain.com', 'Your Name')
//       	->to('to@otherdomain.com', 'Receiver Name')
//       	->subject('From SparkPost with ❤');
//   });

// });



// Route::any('{all}', function(){
//     return '404 Error';
//     // return view('errors.404');
// })->where('all', '.*');