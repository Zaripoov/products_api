<?php

use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\PingController;
use App\Http\Controllers\Api\V1\RegistrationController;
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

Route::name('api.')->middleware(['return-json'])->group(function () {

    Route::prefix('v1')->group(function () {

        Route::get('ping', [PingController::class, 'ping']);

        Route::post('login', [LoginController::class, 'login']);

        Route::post('registration', [RegistrationController::class, 'registration']);

    });

    Route::fallback(function () {
        return response()->json([
            'error' => __('Not found'),
        ], 404);
    });
});


