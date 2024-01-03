<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NelayanController;
use App\Http\Controllers\Api\APIAuthController;

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
Route::post('register', [APIAuthController::class, 'register']);
Route::post('login', [APIAuthController::class, 'login']);
Route::get('/berita', [APIAuthController::class, 'getMarineNews'])->name('berita');
Route::get('/barangsewa', [APIAuthController::class, 'viewbarangsewa'])->name('barangsewa');

route::post('/sewakanalat', [APIAuthController::class, 'storesewaalat'])->name('nealayan.storesewaalat');
route::post('/uploadpotouser', [APIAuthController::class, 'uploadpotouser']);
route::post('/deletepotouser', [APIAuthController::class, 'deletepotouser']);
route::post('/update', [APIAuthController::class, 'update']);
route::get('/getLoggedInUserData', [APIAuthController::class, 'getLoggedInUserData']);