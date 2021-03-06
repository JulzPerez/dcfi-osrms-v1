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
Route::get('/searchIDForm', 'StudentController@searchIDForm')->name('searchIDForm');
Route::get('/getFatherInfo/{id}', 'StudentController@getFatherInfo')->name('getFatherInfo');
Route::get('/getMotherInfo/{id}', 'StudentController@getMotherInfo')->name('getMotherInfo');
Route::get('/getGuardianInfo/{id}', 'StudentController@getGuardianInfo')->name('getGuardianInfo');
Route::post('/updateParentInfo', 'StudentController@updateParentInfo')->name('updateParentInfo');
Route::get('/updateFamily/{id}', 'StudentController@updateFamilyInfo')->name('updateFamily');
Route::post('/addGuardian', 'StudentController@addGuardian')->name('addGuardian');


Route::get('/', 'HomeController@index')->name('home');
Route::get('/enrollment/create', 'EnrollmentController@create_enrollForm')->name('enroll_create');
Route::post('/enrollment', 'EnrollmentController@enroll')->name('enroll_store');
Route::get('/enrollment', 'EnrollmentController@index')->name('enroll_index');

Route::get('/getLocality', 'StudentController@getLocalityByProvince')->name('getLocality');
Route::get('/getGradeLevel', 'EnrollmentController@getGradeLevel')->name('getGradeLevel');
Route::get('/getTrack', 'EnrollmentController@getTrack')->name('getTrack');
Route::get('/getStrand', 'EnrollmentController@getStrand')->name('getStrand');
Route::get('/getModality', 'EnrollmentController@getModality')->name('getModality');

//for payments
Route::group(['prefix' => 'account'], function () {
    Route::get('/', ['as' => 'account.index', 'uses' => 'AccountTrackingController@index']);
    Route::get('/billDetails/{id}', ['as' => 'account.billDetails', 'uses' => 'AccountTrackingController@billDetails']);
    Route::get('/payments/{id}', ['as' => 'account.payments', 'uses' => 'AccountTrackingController@payments']);
    Route::get('/getPayments', ['as' => 'account.getPayments', 'uses' => 'getPaymentsController@index']);

});

Route::group(['prefix' => 'grade'], function () {
    Route::get('/', ['as' => 'grade.index', 'uses' => 'GradesController@index']);
    

});

//for payments download
Route::get('/searchForm', 'GetPaymentsController@index')->name('searchForm');
Route::get('/getStudent', 'GetPaymentsController@getStudent')->name('getStudent');
Route::get('/getStudentPayments/{id}', 'GetPaymentsController@getStudentPayments')->name('getStudentPayments');
//Route::get('/downloadFile/{id}','GetPaymentsController@downloadFile')->name('downloadFile');
Route::get('/getAllStudents', 'GetPaymentsController@getAllStudents')->name('getAllStudents');

//for student requirements download
Route::get('/searchFormRequirements', 'GetStudentRequirementsController@index')->name('searchFormRequirements');
Route::get('/getStudentList', 'GetStudentRequirementsController@getStudentList')->name('getStudentList');
Route::get('/getStudentRequirements/{id}', 'GetStudentRequirementsController@getStudentRequirements')->name('getStudentRequirements');
Route::get('/downloadDocument/{id}','GetStudentRequirementsController@downloadDocument')->name('downloadDocument');
Route::get('/getAllStudentList', 'GetStudentRequirementsController@getAllStudentList')->name('getAllStudentList');

Route::get('/SRMSAccountOnline', 'OnlineSRMSController@index')->name('SRMSAccountOnline');
Route::post('/create_OnlineSRMSUser', 'OnlineSRMSController@OnlineSRMSUser')->name('create_OnlineSRMSUser');

//external download
Route::get('/downloadFile/{id}','ExternalDownloadController@downloadFile')->name('downloadFile');

//notification
Route::get('send', 'NotificationController@index');
