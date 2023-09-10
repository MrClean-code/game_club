<?php

use App\Http\Controllers\ClubController;
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

Route::get('club', [ClubController::class, 'getClubs']);

Route::get('club/{id}', [ClubController::class, 'getClubById']);

Route::post('club', [ClubController::class, 'saveClub']);
Route::put('club/{id}/{club}', [ClubController::class, 'editClub']);
Route::delete('club/{club}', [ClubController::class, 'deleteClub']);

