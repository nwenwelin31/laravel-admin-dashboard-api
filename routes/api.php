<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APICategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/category',[APICategoryController::class,'index']);
Route::post('/category/store',[APICategoryController::class,'store']);
Route::delete('/category/delete/{id}',[APICategoryController::class,'destroy']);
Route::get('/category/show/{id}',[APICategoryController::class,'show']);
Route::post('/upload',[APICategoryController::class,'upload']);
Route::get('/category/edit/{id}',[APICategoryController::class,'edit']);
Route::put('/category/update/{id}',[APICategoryController::class,'update']);
