<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ProjectController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:admin-api']], function () {
    Route::post('register', [UserController::class, 'store']);
    Route::post('login', [UserController::class, 'login']);
});

Route::apiResource('users', UserController::class)->except('store')->middleware([
    'auth:api',
]);

// Route::group(
//     ['middleware' => ['auth:api', 'auth:admin-api']],
//     function () {
//         Route::apiResource('users', UserController::class)->except('store');
//     }
// );
