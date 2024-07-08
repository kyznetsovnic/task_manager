<?php

use App\Http\Controllers\TaskController;
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

Route::controller(TaskController::class)->prefix('tasks')->group(function () {
    Route::get('{id}', 'show');
    Route::get('/', 'list');
    Route::post('/', 'create');
    Route::put('{id}', 'edit');
    Route::delete('{id}', 'delete');
});
