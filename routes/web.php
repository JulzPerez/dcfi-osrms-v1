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

