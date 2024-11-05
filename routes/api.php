<?php

use App\Http\Controllers\ActivityController;
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

//https://booking.rwandair.com/online/packages/api/v1/search?origin=NBO&destination=KGK&departure_date=2024-10-28&return_date=2024-10-29&occupancy={"adults":2}[&lang=en]
// https://booking.rwandair.com//online/packages/api/v1/search?departure_date=2024-10-22&lang=es&occupancy=[{"adults":2}]&origin=LHR&return_date=2024-10-24&destination=KGL&lang=en

Route::get('jobs',[JobsApiController::class,'index']);
Route::get('jobs/{id}',[JobsApiController::class,'view']);
Route::post('jobs/store',[JobsApiController::class,'store']);
Route::post('jobs/views/{id}',[JobsApiController::class,'storeViews']);
Route::get('jobs/search/{search}',[JobsApiController::class,'search']);
Route::get('notifications',[ActivityController::class,'notifications']);
Route::get('jobs/count',[JobsApiController::class,'count']);


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
