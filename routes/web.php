<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::controller(AuthController::class)->group(function(){
    Route::get('/login','login')->name('login');
    Route::post('/login.process','login_process')->name('login.process');
    Route::get('/register','register')->name('register');
    Route::post('/register.process','register_process')->name('register_process');
    Route::get('/logout','logout')->name('logout');
    
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/dashboard','dashboard')->name('dashboard');
    });
});

Route::controller(SettingController::class)->group(function(){

    Route::group(['middleware' => 'auth'], function(){
        Route::get('/settings','setting')->name('settings');        
        Route::post('/setting.post.picture','update_picture')->name('settings.post.picture');
        Route::get('/delete','delete_profile')->name('delete.profile');
    });
});