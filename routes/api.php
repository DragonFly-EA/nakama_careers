<?php

use App\Http\Controllers\Api\JobsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('jobs',[JobsApiController::class,'index']);
Route::get('jobs/{id}',[JobsApiController::class,'view']);
Route::post('jobs/store',[JobsApiController::class,'store']);
Route::post('jobs/views/{id}',[JobsApiController::class,'storeViews']);


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
