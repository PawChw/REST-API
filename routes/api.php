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

Route::get('chwalczyk/310496/people', [\App\Http\Controllers\PeopleController::class, 'index']);
Route::post('chwalczyk/310496/people', [\App\Http\Controllers\PeopleController::class, 'create']);
Route::get('chwalczyk/310496/people/{id}', [\App\Http\Controllers\PeopleController::class, 'read']);
Route::put('chwalczyk/310496/people/{id}', [\App\Http\Controllers\PeopleController::class, 'update']);
Route::delete('chwalczyk/310496/people/{id}', [\App\Http\Controllers\PeopleController::class, 'remove']);
