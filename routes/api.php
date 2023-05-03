<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/list', 'App\Http\Controllers\ListController@index');
Route::post('/list/create', 'App\Http\Controllers\ListController@createList');
Route::put('/list/rename', 'App\Http\Controllers\ListController@renameList');
Route::delete('/list/delete', 'App\Http\Controllers\ListController@deleteList');

Route::post('/task/create', 'App\Http\Controllers\ListController@createTask');
Route::put('/task/rename', 'App\Http\Controllers\ListController@renameTask');
Route::delete('/task/{id}', 'App\Http\Controllers\ListController@deleteTask');
Route::put('/task/status', 'App\Http\Controllers\ListController@changeTaskStatus');



