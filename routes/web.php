<?php

use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\CourseController;
use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::group(['prefix'=> 'categories'],function (){
    Route::get('/{id}', [CategoryController::class, 'show'])->name('site.categories.show');
});

Route::group(['prefix'=> 'courses'],function (){
    Route::get('/', [CourseController::class, 'index'])->name('site.courses.index');
    Route::get('/{id}', [CourseController::class, 'show'])->name('site.course.show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
