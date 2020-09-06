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

Auth::routes(); // Login and register route from laravel

// Welcome page -homepage
Route::get('/', 'HomeController@index')->name('home');
Route::get('/homepage', 'HomeController@index')->name('home');

// admin user route
Route::namespace ('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->middleware('role:admin')
    ->group(function () {

        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('/students', 'AdminController@students')->name('students');
        Route::resource('/users', 'UsersController');
        Route::resource('/courses', 'CoursesController');
        Route::resource('course.topics', 'TopicsController');
        Route::resource('course.topic.lessons', 'LessonsController');
        Route::resource('/questions', 'QuestionsController');
        Route::resource('/quizzes', 'QuizzesController');
        Route::resource('question.answers', 'AnswersController');
    });

// Digitutor route
Route::namespace ('Digitutor')
    ->middleware('can:digitutor')
    ->prefix('digitutor')
    ->name('digitutor.')
    ->group(function () {

        Route::get('/view/{id}', 'DigitutorController@view')->name('view');
        Route::get('/quiz-result/{id}', 'DigitutorController@result')->name('quiz-result');
        Route::post('/mark-answer', 'DigitutorController@markAnswer')->name('mark-answer');
        Route::post('/send-message', 'DigitutorController@sendMessage')->name('send-message');
        Route::resource('/digitutors', 'DigitutorController');
        Route::resource('/conversation', 'ConversationController');
    });

// student  route
Route::namespace ('Student')
    ->middleware('role:student')
    ->prefix('student')
    ->group(function () {

        Route::get('/studentdashboard', 'StdaccountController@studentdashboard')->name('studentdashboard');
        Route::get('/account', 'StdaccountController@index')->name('studentaccount');
        Route::get('/edit', 'StdaccountController@edit')->name('editstudent');
        Route::post('/update', 'StdaccountController@update')->name('updatestudent');
        Route::get('/course', 'StdcourseController@index')->name('studentcourse');
        Route::get('/topic/{id}', 'StdtopicController@show')->name('studenttopic');
        Route::get('/quiz/{quiz_id}/questions', 'StdquizController@questions')->name('studentquizquestions');
        Route::post('/quiz/{quiz_id}/answers', 'StdquizController@answers')->name('studentquizanswers');
        Route::get('/quiz/{id}', 'StdquizController@show')->name('studentquiz');
    });

// admin route
Route::namespace ('Tutor')
    ->middleware('role:tutor')
    ->prefix('tutor')
    ->group(function () {

        Route::get('/tutordashboard', 'TutaccountController@tutordashboard')->name('tutordashboard');
        Route::get('/tutoraccount', 'TutaccountController@index')->name('tutoraccount');
        Route::get('/edittutor', 'TutaccountController@edit')->name('edittutor');
        Route::post('/updatetutor', 'TutaccountController@update')->name('updatetutor');
        Route::get('/getstudent{id}', 'TutstudentController@show')->name('viewstudent');

    });