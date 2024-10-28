<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect('/login');
});
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/jobsViews/{id}', [HomeController::class, 'view'])->name('jobsViews');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Jobs Routes
    Route::group(['prefix'=>'jobs'],function (){
        Route::get('/', [JobController::class, 'index'])->name('jobs.index');
        Route::get('/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('/store', [JobController::class, 'store'])->name('jobs.store');
        Route::get('/view/{id}', [JobController::class, 'view'])->name('jobs.view');
        Route::get('/edit/{id}', [JobController::class, 'edit'])->name('jobs.edit');
        Route::post('/update', [JobController::class, 'update'])->name('jobs.update');
    });
    //Applications
    Route::group(['prefix'=>'applications'],function (){
        Route::get('/', [ApplicationController::class, 'index'])->name('applications.index');
        Route::get('/view/{id}', [ApplicationController::class, 'view'])->name('applications.view');
        Route::put('/status/{id}/{statusId}', [ApplicationController::class, 'status'])->name('applications.status');
    });
    //Administration
    Route::group(['prefix'=>'users'],function (){
        Route::get('/', [UserController::class, 'index'])->name('users.index');
    });
});

require __DIR__.'/auth.php';
