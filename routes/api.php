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

route::post('/sewakanalat', [APIAuthController::class, 'storesewaalat'])->name('nealayan.storesewaalat')->middleware('auth:sanctum');
route::post('/uploadpotouser', [APIAuthController::class, 'uploadpotouser']);
route::post('/deletepotouser', [APIAuthController::class, 'deletepotouser'])->middleware('auth:sanctum');
route::post('/update', [APIAuthController::class, 'update'])->middleware('auth:sanctum');
route::get('/getLoggedInUserData', [APIAuthController::class, 'getLoggedInUserData'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/nelayan', function (Request $request) {
    return $request->user();
});
Route::post('loginnelayan', [APIAuthController::class, 'loginnelayan']);
Route::middleware('auth:sanctum')->delete('/deleteBarangSewa/{kode_barang}', [APIAuthController::class, 'deleteBarangSewa']);
Route::middleware('auth:sanctum')->post('/updateBarangSewa/{kode_barang}', [APIAuthController::class, 'updateBarangSewa']);
Route::middleware('auth:sanctum')->post('/tambahBarangSewa', [APIAuthController::class, 'tambahBarangSewa']);
Route::middleware('auth:sanctum')->get('/barangsewanelayan', [APIAuthController::class, 'ViewBarangsewanelayan']);
Route::middleware('auth:sanctum')->get('/keranjangApi', [APIAuthController::class, 'keranjangApi']);
Route::middleware('auth:sanctum')->get('/keranjangApi2', [APIAuthController::class, 'keranjangApi2']);
Route::middleware('auth:sanctum')->get('/barangKembaliApi', [APIAuthController::class, 'barangKembaliApi']);

Route::middleware('auth:sanctum')->get('/mulaisewaApi', [APIAuthController::class, 'storesewa']);
Route::get('/cancel/{kode_barang}/{jumlah}/{jumlah2}/{kode_sewa}', [APIAuthController::class, 'cancel'])->name('cancel')->middleware('auth:sanctum');