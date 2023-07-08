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

Route::group(array('middleware' => ['auth:' . TEACHERS_GUARD]), function () {
    Route::get('dashboard', 'MainController@index')->name('dashboard.index');
    Route::get('course', 'CourseController@index')->name('course.index');
    Route::get('course/{id}', 'CourseController@show')->name('course.show');
    Route::post('accreditation', 'CourseController@accreditation')->name('course.accreditation');
    Route::post('course/evaluation', 'CourseController@evaluation')->name('course.evaluation');
    Route::get('reset-password', 'ResetPasswordController@resetPasswordView')->name('reset-password.index');
    Route::post('reset-password', 'ResetPasswordController@reset')->name('reset-password');
    Route::calendarRoutes();
});

Route::authRoutes('teacher');
