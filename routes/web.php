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
Route::get('/admindashboard', 'HomeController@admindashboard')->name('admindashboard')->middleware('role:admin');
Route::get('/studentdashboard', 'HomeController@studentdashboard')->name('studentdashboard')->middleware('role:student');
Route::get('/tutordashboard', 'HomeController@tutordashboard')->name('tutordashboard')->middleware('role:tutor');

Route::namespace ('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->middleware('role:admin')
    ->group(function () {

        Route::resource('/users', 'UsersController');
        Route::resource('/courses', 'CoursesController');
        Route::resource('/topics', 'TopicsController');
        Route::resource('/lessons', 'LessonsController');
        Route::resource('/questions', 'QuestionsController');
        Route::resource('/digitutors', 'DigitutorsController');
        Route::resource('/quizzes', 'QuizzesController');
        Route::resource('question.answers', 'AnswersController');

    });

Route::namespace ('Student')
    ->middleware('can:manage-users')
//->prefix('student')
    ->group(function () {

        Route::get('/digitutor', 'StddigitutorController@index')->name('digitutor');
        Route::get('/digitutor{id}', 'StddigitutorController@showdigitutor')->name('studentdigitutor');
        // Route::get('/quiz/{quiz_id}/result', 'StddigitutorController@result')->name('studentquizresult');

    });

Route::namespace ('Student')
    ->middleware('role:student')
    ->prefix('student')
    ->group(function () {

        Route::get('/account', 'StdaccountController@index')->name('studentaccount');
        Route::get('/edit', 'StdaccountController@edit')->name('editstudent');
        Route::post('/update', 'StdaccountController@update')->name('updatestudent');
        Route::get('/course', 'StdcourseController@index')->name('studentcourse');
        Route::get('/topic/{id}', 'StdtopicController@show')->name('studenttopic');
        // Route::get('/digitutor', 'StddigitutorController@index')->name('studentdigitutor');
        Route::get('/quiz/{quiz_id}/questions', 'StdquizController@questions')->name('studentquizquestions');
        Route::post('/quiz/{quiz_id}/answers', 'StdquizController@answers')->name('studentquizanswers');
         Route::get('/quiz/{quiz_id}/result', 'StdquizController@result')->name('studentquizresult');
        Route::get('/quiz/{id}', 'StdquizController@show')->name('studentquiz');
    });

Route::namespace ('Tutor')
    ->middleware('role:tutor')
    ->group(function () {

        Route::get('/tutoraccount', 'TutaccountController@index')->name('tutoraccount');
        Route::get('/edittutor', 'TutaccountController@edit')->name('edittutor');
        Route::post('/updatetutor', 'TutaccountController@update')->name('updatetutor');
        Route::get('/getstudent{id}', 'TutstudentController@show')->name('viewstudent');
        //  Route::get('/digitut{id}', 'TutstudentController@showdigitutor')->name('studentdigitut');

    });

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
/* Route::namespace ('Admin')->prefix('admin')->name('admin.')->group(function () {
Route::resource('/courses', 'CoursesController');
}); */

// Route::resource('/admin/users', 'Admin\UsersController');