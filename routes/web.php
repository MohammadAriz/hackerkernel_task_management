<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

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
Route::get('/dashboard',[UserController::class,'dashboard']);

Route::get('/users',[UserController::class,'index']);
Route::get('/export-user',[UserController::class,'export_user']);
Route::get('/create',[UserController::class,'create']);
Route::post('/create',[UserController::class,'store']);
Route::get('/edit/{id}',[UserController::class,'edit']);
Route::post('/update/{id}',[UserController::class,'update']);
Route::get('/delete/{id}',[UserController::class,'delete']);

Route::get('/tasks',[TaskController::class,'index']);
Route::get('/export-task',[TaskController::class,'export_task']);

Route::get('/create-task',[TaskController::class,'create']);
Route::post('/create-task',[TaskController::class,'store']);
Route::get('/edit-task/{id}',[TaskController::class,'edit']);
Route::post('/update-task/{id}',[TaskController::class,'update']);
Route::get('/delete-task/{id}',[TaskController::class,'delete']);
