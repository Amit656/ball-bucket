<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BallController;
use App\Http\Controllers\BucketController;

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

Route::post('/buckets', [BucketController::class, 'store'])->name('buckets.store');
Route::post('/suggest-buckets', [BucketController::class, 'suggestBuckets'])->name('buckets.suggest');
Route::post('/balls', [BallController::class, 'store'])->name('balls.store');
Route::get('/balls', [BallController::class, 'index'])->name('balls.index');
