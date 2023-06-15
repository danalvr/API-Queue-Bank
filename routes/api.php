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

Route::get('/queue-bank', [QueueNumberController::class, 'index']);
Route::get('/queue-bank/{id}', [QueueNumberController::class, 'show']);
// Route::post('/queue-bank', [QueueNumberController::class, 'store']);
Route::post('/queue-bank/type/{queueTypeId}', [QueueNumberController::class, 'store']);
