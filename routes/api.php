<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


Route::post('/create-user',[UserController::class,'store']);
Route::get('/get-user',[UserController::class,'getOne']);
Route::get('/get-all-user',[UserController::class,'getAll']);
Route::post('/edit-user',[UserController::class,'update']);
Route::post('/delete-user',[UserController::class,'delete']);
