<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::middleware('TeacherAuth:teacher')->group(function () { 
        Route::post('/me', 'AuthController@me');
        Route::post('/logout', 'AuthController@logout');
        Route::post('/fcm-update', 'AuthController@updateFcmToken');
    });





