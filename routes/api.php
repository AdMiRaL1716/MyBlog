<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//******** Log ********//
Route::post('login', [App\Http\Controllers\UserController::class, 'login']);
Route::post('register', [App\Http\Controllers\UserController::class, 'register']);
Route::post('logout', [App\Http\Controllers\UserController::class, 'logout'])->middleware('auth:sanctum');

//******** Categories ********//
Route::group(['prefix' => 'categories', 'middleware' => 'auth:sanctum'], function () {
    Route::get('categories', [App\Http\Controllers\CategoryController::class, 'categories']);
    Route::post('add', [App\Http\Controllers\CategoryController::class, 'create']);
    Route::get('edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit']);
    Route::post('update/{id}', [App\Http\Controllers\CategoryController::class, 'update']);
    Route::delete('delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete']);
});
