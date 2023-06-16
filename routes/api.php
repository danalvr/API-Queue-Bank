<?php

use App\Http\Controllers\QueueNumberController;
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

// Queue Number
Route::get('/queue-bank', [QueueNumberController::class, 'index']);
Route::get('/queue-bank/{id}/detail', [QueueNumberController::class, 'show']);
Route::get('/queue-bank/type/{queueTypeId}', [QueueNumberController::class, 'filterByType']);
Route::post('/queue-bank/type/{queueTypeId}', [QueueNumberController::class, 'store']);
Route::patch('/queue-bank/{id}/detail', [QueueNumberController::class, 'update']);
Route::delete('/queue-bank/type/{queueTypeId}', [QueueNumberController::class, 'destroy']);
