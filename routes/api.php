<?php

use App\Http\Controllers\InformationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/all-users', [InformationController::class, 'index']);
Route::get('/user/{id}', [InformationController::class, 'show']);
Route::post('/new_user', [InformationController::class, 'store']);
Route::get('/user_edit/{id}', [InformationController::class, 'edit']);
Route::put('/user_update/{id}', [InformationController::class, 'update']);
Route::delete('/delete_user/{id}', [InformationController::class, 'destroy']);
