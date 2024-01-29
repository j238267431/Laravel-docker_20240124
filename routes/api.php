<?php

use App\Http\Controllers\GetTopController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\ResultsController;
use App\Http\Middleware\EmailExists;

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

Route::get('/members', [MembersController::class, 'index']);
Route::get('/result', [ResultsController::class, 'showResultForm'])->name('showResultForm');
Route::post('/addNewMember', [ResultsController::class, 'newMember'])->name('addNewMember');

Route::middleware([EmailExists::class])->group(function () {
    Route::post('/result', [ResultsController::class, 'addResult'])->name('addResult');
});
Route::get('/top', [GetTopController::class, 'showForm'])->name('getTop');
Route::post('/top', [GetTopController::class, 'getResults'])->name('getResults');