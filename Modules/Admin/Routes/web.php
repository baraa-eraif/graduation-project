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

Route::group(array('middleware' => ['auth:' . ADMINS_GUARD]), function () {
    Route::get('dashboard', 'MainController@index')->name('dashboard.index');
    Route::resourceRoutes('teacher', 'TeacherController');
    Route::resourceRoutes('student', 'StudentController');
    Route::resourceRoutes('course', 'CourseController');
    Route::resourceRoutes('specialization', 'SpecializationController');
//    Route::resourceRoutes('semester', 'SemesterController');
    Route::resourceRoutes('study-plan', 'StudyPlanController',function (){
        Route::post('accreditation','StudyPlanController@accreditation')->name('study-plan.accreditation');
    });
    Route::resourceRoutes('blog', 'BlogController');
    Route::resourceRoutes('notification', 'NotificationController');
    Route::get('enroll-course-request', 'EnrollCourseRequestController@index')->name('enroll-course-request.index');
    Route::post('enroll-course-request/accept', 'EnrollCourseRequestController@accept')->name('enroll-course-request.accept');
    Route::post('enroll-course-request/reject', 'EnrollCourseRequestController@reject')->name('enroll-course-request.reject');

    Route::get('accreditation-grades', 'accreditationGradesController@index')->name('accreditation-grades.index');
    Route::post('accreditation/grades', 'accreditationGradesController@accreditation');


    Route::get('student/financial/{id}', 'StudentController@financialInfo');


    Route::group(array('prefix' => 'financial'), function () {
        Route::get('/student/{student_id}', 'FinancialController@studentProfile')->name('financial.profile');
        Route::get('/', 'FinancialController@view')->name('financial.index');
        Route::get('/search-student', 'FinancialController@searchStudent')->name('search.student');
        Route::post('/add-amount', 'FinancialController@addAmount');
    });
    Route::calendarRoutes();
});

Route::authRoutes('admin');

