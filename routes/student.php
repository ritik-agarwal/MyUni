<?php

use App\Http\Controllers\Student\Auth\LoginController;
use App\Http\Controllers\Student\UserProfileController;
use Illuminate\Support\Facades\Route;

// use Illuminate\Routing\Route;

Route::group(['middleware' => 'student'], function () {
	Route::view('/student', 'student.index')->name('student.dashboard');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('student.profile.update');
	Route::post('/logout', [LoginController::class, 'logout'])->name('student.logout');
});
