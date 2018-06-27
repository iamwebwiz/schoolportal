<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you ca` register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>'auth'], function() {
    Route::resource('sections', 'SectionsController');
    Route::resource('staff', 'StaffController');
    Route::resource('students', 'StudentsController');
    Route::resource('sponsors', 'SponsorsController');
    Route::get('/schoolclass/addstudents/{id}', [
        'uses' => 'SchoolclassesController@addstudent',
        'as' => 'schoolclass.addstudents'
    ]); 
    Route::put('/schoolclass/storestudents/{id}', [
        'uses' => 'SchoolclassesController@storestudent',
        'as' => 'schoolclass.storestudents'
    ]); 
    Route::delete('/schoolclass/removestudent/{id}', [
        'uses' => 'SchoolclassesController@removestudent',
        'as' => 'schoolclass.removestudent'
    ]); 
    
    Route::get('/schoolclass/addsubjects/{id}', [
        'uses' => 'SchoolclassesController@addsubject',
        'as' => 'schoolclass.addsubjects'
    ]);
    
    Route::get('/schoolclass/addbooks/{id}', [
        'uses' => 'SchoolclassesController@addbook',
        'as' => 'schoolclass.addbooks'
    ]);
    
    Route::get('/schoolclass/addattendance/{id}', [
        'uses' => 'SchoolclassesController@addattendance',
        'as' => 'schoolclass.addattendance'
    ]);

    Route::get('/schoolclass/addassignment/{id}', [
        'uses' => 'SchoolclassesController@addassignment',
        'as' => 'schoolclass.addassignment'
    ]);
    Route::resource('schoolclass', 'SchoolclassesController');
    Route::resource('books', 'BooksController');
    Route::resource('subjects', 'SubjectsController');
    Route::resource('sessions', 'SessionsettingsController');
    Route::resource('users', 'UsersController');
    Route::resource('assignment', 'AssignmentsController');
    Route::resource('attendance', 'AttendanceController');
});

