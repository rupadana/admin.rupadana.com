<?php

use App\Filament\Resources\BookmarkResource\Api\BookmarkApiService;
use App\Filament\Resources\LearnContentResource\Api\LearnContentApiService;
use App\Filament\Resources\LearnSerieResource\Api\LearnSerieApiService;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

LearnSerieApiService::routes();
LearnContentApiService::routes();
BookmarkApiService::routes();
