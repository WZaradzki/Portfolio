<?php

use App\Http\Controllers\Api\Activities\ActivitiesController;
use App\Http\Controllers\Api\Bio\BioController;
use App\Http\Controllers\Api\Portofolios\PortfoliosController;
use App\Http\Controllers\Api\Tools\ToolsController;
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

Route::apiResource('tools', ToolsController::class);
Route::apiResource('activities', ActivitiesController::class);
Route::apiResource('bio', BioController::class);
Route::apiResource('portfolios', PortfoliosController::class);
Route::get('portfolio-lang/{lang}', [PortfoliosController::class, 'lang']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
