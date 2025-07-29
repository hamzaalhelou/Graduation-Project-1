<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\JournalistController;
use App\Http\Controllers\Admin\ResearchController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\SiteController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())->middleware('auth')->group(function(){
    Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('/profile/update',[AdminController::class,'update'])->name('profile.update')->middleware('auth');
    Route::resource('sliders',SliderController::class);
    Route::resource('features',FeaturesController::class);
    Route::resource('courses',CourseController::class);
    Route::resource('teacher',TeacherController::class);
    Route::resource('events',EventController::class);
    Route::resource('journalists',JournalistController::class);
    Route::resource('research',ResearchController::class);
Route::resource('roles', RoleController::class);});
    Route::get('/', [SiteController::class, 'index'])->name('site.home');
    Route::get('/about', [SiteController::class, 'about'])->name('site.about');
    Route::get('/courses', [SiteController::class, 'courses'])->name('site.courses');
    Route::get('/events', [SiteController::class, 'events'])->name('site.events');
    Route::get('/blog', [SiteController::class, 'blog'])->name('site.blog');
    Route::get('/contact', [SiteController::class, 'contact'])->name('site.contact');
    Route::get('/research', [SiteController::class, 'research'])->name('site.research');
    Route::get('/teacher', [SiteController::class, 'teacher'])->name('site.teacher');
    Route::get('/notice', [SiteController::class, 'notice'])->name('site.notice');
    Route::get('/scholarship', [SiteController::class, 'scholarship'])->name('site.scholarship');
    Route::get('/courses/{id}', [SiteController::class, 'course_single'])->name('site.course_single');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
