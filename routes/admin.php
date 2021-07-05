<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace'=>'Admin','middleware' => 'auth:admin'], function() {
    Route::get('logout' ,[AuthController::class, 'logout']) -> name('admin.logout');

    Route::get('/', [DashboardController::class,'index']) -> name('admin.dashboard');



    /* ############## Begin Categories  Routes ################ */
    Route::group(['prefix' => 'categories'], function (){
        Route::get('/',[CategoryController::class, 'index'])->name('admin.categories');

        Route::get('create',[CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('store',[CategoryController::class, 'store'])->name('admin.categories.store');

        Route::get('edit/{id}',[CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('update',[CategoryController::class, 'update'])->name('admin.categories.update');

        Route::get('delete/{id}',[CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });
    /* ############### End Categories  Routes ################# */


    /* ############## Begin Courses  Routes ################ */
    Route::group(['prefix' => 'courses'], function (){
        Route::get('/',[CourseController::class, 'index'])->name('admin.courses');

        Route::get('create',[CourseController::class, 'create'])->name('admin.courses.create');
        Route::post('store',[CourseController::class, 'store'])->name('admin.courses.store');

        Route::get('edit/{id}',[CourseController::class, 'edit'])->name('admin.courses.edit');
        Route::post('update',[CourseController::class, 'update'])->name('admin.courses.update');

        Route::get('delete/{id}',[CourseController::class, 'destroy'])->name('admin.courses.destroy');
    });
    /* ############### End Courses  Routes ################# */

});



Route::group(['namespace'=>'Admin','middleware' => 'guest:admin'], function(){
    Route::get('login' ,[AuthController::class, 'getLogin'])-> name('get.admin.login');
    Route::post('login' ,[AuthController::class, 'login']) -> name('admin.login');
});
