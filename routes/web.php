<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::Resource('users', 'UserController');
Route::Resource('student', 'StudentController');
Route::Resource('upload', 'UploadRequirementsController');
Route::Resource('payment', 'UploadPaymentController');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/enrollment/create', 'EnrollmentController@create_enrollForm')->name('enroll_create');
Route::post('/enrollment', 'EnrollmentController@enroll')->name('enroll_store');
Route::get('/enrollment', 'EnrollmentController@index')->name('enroll_index');

Route::get('/getMunicipality', 'StudentController@getMunicipalityByProvince')->name('getMunicipality');
Route::get('/getCity', 'StudentController@getCityByProvince')->name('getCity');
Route::get('/getGradeLevel', 'EnrollmentController@getGradeLevel')->name('getGradeLevel');
Route::get('/getTrack', 'EnrollmentController@getTrack')->name('getTrack');
Route::get('/getStrand', 'EnrollmentController@getStrand')->name('getStrand');
Route::get('/getModality', 'EnrollmentController@getModality')->name('getModality');

//for payments
Route::group(['prefix' => 'account'], function () {
    Route::get('/', ['as' => 'account.index', 'uses' => 'AccountTrackingController@index']);
    Route::get('/billDetails/{id}', ['as' => 'account.billDetails', 'uses' => 'AccountTrackingController@billDetails']);
    Route::get('/payments/{id}', ['as' => 'account.payments', 'uses' => 'AccountTrackingController@payments']);
});

