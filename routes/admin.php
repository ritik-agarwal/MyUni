<?php

use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\CollegeCourseController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EntranceExamsController;
use App\Http\Controllers\Admin\StreamController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware(['auth'])->group(function () {
	Route::resource('/streams',StreamController::class);
	Route::resource('/course-category',CourseCategoryController::class);
	Route::resource('/courses',CourseController::class);
	Route::resource('/college', CollegeController::class);
	Route::resource('/college-course', CollegeCourseController::class);
	Route::resource('/entrance-exam', EntranceExamsController::class);

	Route::get('/admissionlist',[AdmissionController::class,'index'])->name('admission.list');
	Route::get('/show',[CollegeCourseController::class,'showColleges'])->name('show.colleges');

	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	// Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	// Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	// Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
});
