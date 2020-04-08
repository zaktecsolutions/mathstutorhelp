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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admindashboard', 'HomeController@admindashboard')->name('admindashboard')->middleware('can:admin-gate');
Route::get('/studentdashboard', 'HomeController@studentdashboard')->name('studentdashboard')->middleware('can:student-gate');
Route::get('/tutordashboard', 'HomeController@tutordashboard')->name('tutordashboard')->middleware('can:tutor-gate');

Route::namespace ('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-gate')->group(function () {

    Route::resource('/users', 'UsersController');
    Route::resource('/courses', 'CoursesController');
    Route::resource('/topics', 'TopicsController');
    Route::resource('/lessons', 'LessonsController');
    Route::resource('/exams', 'ExamsController');
    Route::resource('/questions', 'QuestionsController');
    Route::resource('/digitutors', 'DigitutorsController');

});

Route::namespace ('Student')->middleware('can:student-gate')->group(function () {

    Route::get('/studentaccount', 'AccountController@index')->name('studentaccount');
    Route::get('/editstudent', 'AccountController@edit')->name('editstudent');
    Route::post('/updatestudent', 'AccountController@update')->name('updatestudent');
});

Route::namespace ('Tutor')->middleware('can:tutor-gate')->group(function () {

    Route::get('/tutoraccount', 'AccountController@index')->name('tutoraccount');
    Route::get('/edittutor', 'AccountController@edit')->name('edittutor');
    Route::post('/updatetutor', 'AccountController@update')->name('updatetutor');
});

/* Route::namespace ('Admin')->prefix('admin')->name('admin.')->group(function () {
Route::resource('/courses', 'CoursesController');
}); */

// Route::resource('/admin/users', 'Admin\UsersController');
