<?php

use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EntranceExamsController;
use App\Http\Controllers\AdmissionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\Student\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Student\SetPassword;

Route::view('/', 'index')->name('index');

Route::get('/course',[CourseController::class,'showCourse'])->name('show.courseList');
Route::get('/course/{id}',[CourseController::class,'showCourseDetail'])->name('show.courseDetail');
Route::get('/courselist/filter',[CourseController::class,'filterCourse'])->name('course.filter');

Route::get('/colleges',[CollegeController::class,'showCollege'])->name('show.collegeList');
Route::get('/college/{id}',[CollegeController::class,'showCollegeDetail'])->name('show.collegeDetail');
Route::get('/colleges/filter',[CollegeController::class,'filterCollege'])->name('college.filter');
Route::get('college/filter/s',[CollegeController::class,'showCourseOption'])->name('show.courseOption');

Route::get('/exams',[EntranceExamsController::class,'showExams'])->name('show.examsList');
Route::get('/exam/{id}',[EntranceExamsController::class,'showExamDetail'])->name('show.examDetail');

Route::get('/admission/form/show',[AdmissionController::class,'showColleges'])->name('show.collegeAdmission');

Route::get('/set-password', [SetPassword::class, 'show'])->middleware('guest')->name('set-password');
Route::post('/set-password', [SetPassword::class, 'update'])->middleware('guest')->name('set.perform');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

Route::middleware(['guest'])->group(function () {
    Route::get('/admission/form',[AdmissionController::class,'show'])->name('show.admissionform');
    Route::post('/admission/submit',[AdmissionController::class,'store'])->name('submit.admissionform');

    Route::get('/student/login', [AuthLoginController::class, 'show'])->name('student.login');
    Route::post('/student/login', [AuthLoginController::class, 'login'])->name('student.login.perform');
    Route::get('/student/reset-password', [ResetPassword::class, 'show'])->name('student.reset-password');
    Route::post('/student/reset-password', [ResetPassword::class, 'send'])->name('student.reset.perform');
    Route::get('/student/change-password', [ChangePassword::class, 'show'])->name('student.change-password');
    Route::post('/student/change-password', [ChangePassword::class, 'update'])->name('student.change.perform');

});

