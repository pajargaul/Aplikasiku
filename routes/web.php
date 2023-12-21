<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NelayanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\Adminnewpassword;
use App\Http\Controllers\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Auth\NelayanForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'index'])->name('login_form');
    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')
        ->middleware('admin');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout')
        ->middleware('admin');
    Route::get('/static-navigation', function () {
        return view('admin.layout-static');
    });
    Route::get('/forgot-password', [AdminForgotPasswordController::class, 'showForgotPasswordForm'])->name('admin.password.request');
    Route::post('/forgot-password', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('/forgot-password/{token}', [AdminForgotPasswordController::class, 'reseturl'])->name('admin.password.reset');
    Route::post('/forgot-password/{token}/{email}', [AdminForgotPasswordController::class, 'processResetPassword'])->name('admin.password.update');
    route::get('/setting', [AdminController::class, 'adminsetting'])->name('admin.setting');
    route::post('/setting', [AdminController::class, 'updatename'])->name('admin.updatename');
    route::post('/setting/updatepassword', [AdminController::class, 'newpassword'])->name('admin.newpassword');

    route::get('/tambahakunnelayan', [AdminController::class, 'admintambahdatanelayan'])->name('admin.tambahdatanelayan');
    route::post('/tambahakunnelayan', [AdminController::class, 'storetambahnelayan'])->name('admin.storetambahnelayan');
    route::get('/lihatdatanelayan', [AdminController::class, 'viewdatanelayan'])->name('admin.lihatdatanelayan');
});

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/produk', function () {
    return view('produk');
})->name('produk');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
Route::prefix('nelayan')->group(function () {
    Route::get('/login', [NelayanController::class, 'index'])->name('nelayan.login_form');
    Route::post('/login/owner', [NelayanController::class, 'Login'])->name('nelayan.login');
    Route::get('/dashboard', [NelayanController::class, 'Dashboard'])->name('nelayan.dashboard')
    ->middleware('nelayan');
    Route::get('/logout', [NelayanController::class, 'nelayanLogout'])->name('nelayan.logout')
    ->middleware('nelayan');
    Route::get('/forgot-password', [NelayanForgotPasswordController::class, 'showForgotPasswordForm'])->name('nelayan.password.request');
    Route::post('/forgot-password', [NelayanForgotPasswordController::class, 'sendResetLinkEmail'])->name('nelayan.password.email');
    Route::get('/forgot-password/{token}', [NelayanForgotPasswordController::class, 'reseturl'])->name('nelayan.password.reset');
    Route::post('/forgot-password/{token}/{email}', [NelayanForgotPasswordController::class, 'processResetPassword'])->name('nelayan.password.update');
});
