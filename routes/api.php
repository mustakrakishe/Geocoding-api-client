<?php

use App\Http\Controllers\PointController;
use App\Http\Controllers\RegionController;
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

Route::resource('/addresses', PointController::class)->only(['store', 'index']);

Route::get('/regions/', [RegionController::class, 'index']);
Route::get('/regions/{region}/addresses', [PointController::class, 'getByRegion']);
Route::get('/cities/{city}/addresses', [PointController::class, 'getByCity']);