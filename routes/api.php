<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[LoginController::class,'login']);
Route::namespace('App\Http\Controllers\API\Teacher')->group(function(){
    Route::get('years','YearsController@index');
    Route::get('groups','GroupsController@index');
    Route::get('days','DaysController@index');
    Route::resource('timetables','TimetablesController');
    Route::resource('exams','ExamsController');
});