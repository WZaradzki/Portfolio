<?php

use App\Http\Controllers\Api\Activities\ActivitiesController;
use App\Http\Controllers\Api\Bio\BioController;
use App\Http\Controllers\Api\Experiences\ExperiencesController;
use App\Http\Controllers\Api\Mail\ContactsController;
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
Route::apiResource('experiencies', ExperiencesController::class);
Route::get('next-portfolio/{id}', [PortfoliosController::class, 'next']);
Route::get('prev-portfolio/{id}', [PortfoliosController::class, 'prev']);
Route::get('portfolio-lang/{lang}', [PortfoliosController::class, 'lang']);
Route::post('mail', [ContactsController::class, 'send']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
