<?php

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

use \Illuminate\Support\Facades\Route;


//middleware('auth:'.STUDENTS_GUARD)
//'middleware' => 'auth:'.STUDENTS_GUARD
Route::group(array('middleware' => ['auth:' . STUDENTS_GUARD]), function () {
    Route::get('dashboard', 'MainController@index')->name('dashboard.index');
    Route::get('course', 'CourseController@index')->name('course.index');
    Route::post('course', 'CourseController@enroll')->name('course.enroll');
    Route::get('student-grades', 'StudentCourseController@index')->name('student-grades.index');
    Route::get('financial', 'StudentBalanceTransactionController@index')->name('financial.index');
    Route::calendarRoutes();
});

Route::authRoutes('student');

