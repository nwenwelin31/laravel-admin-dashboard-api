<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APICategoryController;
use App\Http\Controllers\APIItemController;
use App\Http\Controllers\AllItemController;
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

//crud category
Route::get('/category',[APICategoryController::class,'index']);
Route::post('/category/store',[APICategoryController::class,'store']);
Route::delete('/category/delete/{id}',[APICategoryController::class,'destroy']);
Route::get('/category/show/{id}',[APICategoryController::class,'show']);
Route::get('/category/edit/{id}',[APICategoryController::class,'edit']);
Route::put('/category/update/{id}',[APICategoryController::class,'update']);

// select items equal category id
Route::get('/category/{id}',[AllItemController::class,'getByCategoryId']);

//upload file
Route::post('/upload',[APICategoryController::class,'upload']);

//crud item
Route::get('/item',[APIItemController::class,'index']);
Route::post('/item/store',[APIItemController::class,'store']);
Route::get('/item/edit/{id}',[APIItemController::class,'edit']);
Route::put('/item/update/{id}',[APIItemController::class,'update']);
Route::delete('/item/delete/{id}',[APIItemController::class,'destroy']);
Route::get('/item/show/{id}',[APIItemController::class,'show']);
