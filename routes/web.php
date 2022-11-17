<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MentorCantroller;
use App\Http\Controllers\SearchCantroller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//mentor page Dashboard
Route::get('/mentor/dashboard' ,[App\Http\Controllers\HomeController::class, 'mentor_page'])->name('mentor.dashboard');
// mentor router
Route::resource('mentor',MentorCantroller::class)->names('mentor');
Route::get('mentor/search' , [SearchCantroller::class , 'mentor_search'])->name('mentor.search');
Route::resource('student',StudentController::class)->names('student');
// course router
Route::resource('course',CourseController::class)->names('course');
// group router
Route::resource('team',TeamController::class)->names('team');
// prises
Route::resource('prise',Prisescontroller::class)->names('prise');
