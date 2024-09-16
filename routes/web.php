<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(Auth::check()) {
        return redirect()->route('user.list');
    }
    return redirect()->route('login');
});

Route::get('/login',[\App\Http\Controllers\UserController::class,'login'])->name('login');
Route::post('/login',[\App\Http\Controllers\UserController::class,'loginFormSubmit'])->name('auth.login');
Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('auth.logout');

// There are applicable only for users
Route::view('/forgot-password',"user.forgotPasswordEmailEntry")->name('user.reset-password');

Route::post('/forgot-password',[\App\Http\Controllers\PasswordController::class,'userForgetPasswordEmail'])
    ->middleware('guest')->name('password.email');

Route::get('/reset-password',[\App\Http\Controllers\PasswordController::class,'resetUserPassword'])
    ->name('password.reset');
Route::post('/reset-password',[\App\Http\Controllers\PasswordController::class,'resetUserPasswordAction'])
    ->name('password.reset.submit');

