<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::namespace('App\Http\Controllers\API\Teacher')->group(function () {
    Route::group(['middleware' => ['auth.api']], function () {
        Route::get('teacher-profile', 'ProfileController@profile');
        Route::post('teacher-profile-update', 'ProfileController@profile_update');
        Route::get('years', 'YearsController@index');
        Route::get('groups', 'GroupsController@index');
        Route::get('days', 'DaysController@index');
        Route::resource('timetables', 'TimetablesController');
        Route::resource('exams', 'ExamsController');
        Route::post('question-store', 'QuestionsController@store');
        Route::post('question-update', 'QuestionsController@update');
        Route::post('question-delete', 'QuestionsController@destroy');
        Route::resource('students', 'StudentsController');
        Route::post('student-update/{id}', 'StudentsController@update');
        Route::get('present-students','PresenceController@presentStudents');
        Route::get('absent-students','PresenceController@absentStudents');
    });
});
