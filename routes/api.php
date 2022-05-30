<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\LecturesController;
use App\Http\Controllers\PlansController;

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

Route::apiResource('/students', StudentsController::class);
Route::apiResource('/classes', ClassesController::class);
Route::apiResource('/lectures', LecturesController::class);

Route::get('/plans/{id}', [ClassesController::class, 'showLectures']);
Route::post('/plans', [ClassesController::class, 'storePlans']);
Route::get('/plans', [PlansController::class, 'index']);
Route::put('/plans', [PlansController::class, 'update']);
Route::delete('/plans/{id}', [PlansController::class, 'destroy']);