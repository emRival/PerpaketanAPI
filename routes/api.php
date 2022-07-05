<?php

use App\Http\Controllers\Api\ApiPaketController;
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

Route::get('/paket', [ApiPaketController::class, 'getAllPaket']);
Route::post('/paket-input', [ApiPaketController::class, 'createPaket']);
Route::put('/paket-update/{id}', [ApiPaketController::class, 'updatePaket']);
Route::delete('/paket-delete/{id}', [ApiPaketController::class, 'deletePaket']);

//login
Route::post('/login', [ApiPaketController::class, 'login']);
Route::post('/register', [ApiPaketController::class, 'register']);

//delete user
Route::delete('/delete-user/{id}', [ApiPaketController::class, 'deleteUser']);

//get paket by status
Route::get('/paket-status/{status}', [ApiPaketController::class, 'getPaketByStatus']);

//dashboard
Route::get('/dashboard', [ApiPaketController::class, 'dashboard']);

//reset password by id
Route::put('/reset-password/{id}', [ApiPaketController::class, 'resetPassword']);

//change password by id
Route::put('/change-password/{id}', [ApiPaketController::class, 'changePassword']);

// get landing
Route::get('/landing', [ApiPaketController::class, 'getPaketLanding']);

// get all user
Route::get('/user', [ApiPaketController::class, 'getAllUser']);

// search paket by name
Route::get('/paket-search/{name}', [ApiPaketController::class, 'searchPaketByName']);