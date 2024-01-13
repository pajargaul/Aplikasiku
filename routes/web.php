<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\APIAuthController;
use App\Http\Controllers\NelayanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\Adminnewpassword;
use App\Http\Controllers\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Auth\NelayanForgotPasswordController;
<<<<<<< HEAD
=======
use App\Http\Controllers\PenyewaanController;
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
use App\Models\Tb_Barangsewa;

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
    Route::get('/forgot-password', [AdminForgotPasswordController::class, 'showForgotPasswordForm'])->name('admin.password.request');
    Route::post('/forgot-password', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('/forgot-password/{token}', [AdminForgotPasswordController::class, 'reseturl'])->name('admin.password.reset');
    Route::post('/forgot-password/{token}/{email}', [AdminForgotPasswordController::class, 'processResetPassword'])->name('admin.password.update');

    route::get('/setting', [AdminController::class, 'adminsetting'])->name('admin.setting')
    ->middleware('admin');
    route::post('/setting', [AdminController::class, 'updatename'])->name('admin.updatename')
    ->middleware('admin');
    route::post('/setting/updatepassword', [AdminController::class, 'newpassword'])->name('admin.newpassword')
    ->middleware('admin');

    route::get('/tambahakunnelayan', [AdminController::class, 'admintambahdatanelayan'])->name('admin.tambahdatanelayan')
    ->middleware('admin');
    route::post('/tambahakunnelayan', [AdminController::class, 'storetambahnelayan'])->name('admin.storetambahnelayan')
    ->middleware('admin');
    route::get('/lihatdatanelayan', [AdminController::class, 'viewdatanelayan'])->name('admin.lihatdatanelayan')
    ->middleware('admin');
});

Route::get('/', function () {
    return view('index');
})->name('index');

<<<<<<< HEAD
=======
Route::get('/comingsoon', function () {
    return view('comingsonn');
})->name('comingsonn');

>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
Route::get('/produk', function () {
    $barangSewa = Tb_Barangsewa::all();
    return view('produk', compact('barangSewa'));
})->name('produk');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/berita', [APIAuthController::class, 'getMarineNews'])->name('berita');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
<<<<<<< HEAD
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
=======
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/delete-profile-photo', [ProfileController::class, 'deletepotouser'])->name('delete.profile.photo');
    Route::post('/update-profile-photo',[ProfileController::class, 'uploadpotouser'] )->name('update.profile.photo');
    Route::get('/userabout', [ProfileController::class, 'userabout'])->name('userabout');
    Route::get('/userproduk', [ProfileController::class, 'userproduk'])->name('userproduk');
    Route::get('/usernews', [ProfileController::class, 'usernews'])->name('usernews');
    Route::get('/checkout/{kode_barang}', [PenyewaanController::class, 'sewa'])->name('checkout');
    Route::post('/checkout', [PenyewaanController::class, 'storesewa'])->name('storecheckout');
    Route::get('/usercomingsoon', [ProfileController::class, 'comingsonn'])->name('usercomingsoon');
    route::get('/keranjang', [PenyewaanController::class, 'keranjang'])->name('keranjang');
    Route::get('/hubungi-pemilik/{id}', [PenyewaanController::class, 'hubungiPemilik'])->name('hubungi.pemilik');
});
require __DIR__ . '/auth.php';

>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
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

    route::get('/sewakan-alat', [NelayanController::class, 'sewakanalat'])->name('nelayan.sewakan-alat')
    ->middleware('nelayan');
    route::post('/sewakan-alat', [NelayanController::class, 'storesewaalat'])->name('nealayan.storesewaalat')
    ->middleware('nelayan');
    route::get('/viewbarangsewa', [NelayanController::class, 'viewproduk'])->name('nelayan.viewproduk')
    ->middleware('nelayan');
<<<<<<< HEAD
=======
    route::get('/pesanan', [NelayanController::class, 'pesanan'])->name('nelayan.pesanan')
    ->middleware('nelayan');
    Route::get('/mulaisewa/{kode_sewa}', [PenyewaanController::class, 'mulaisewa'])->name('penyewaan.mulaisewa');
    Route::get('/profile', [NelayanController::class, 'profile'])->name('nelayan.profile');
    Route::post('/update-profile-photo-nelayan',[NelayanController::class, 'uploadpotouser'] )->name('update.profile.photo.nelayan');
    Route::delete('/delete-profile-photo-nelayan', [NelayanController::class, 'deletepotouser'])->name('delete.profile.photo.nelayan');
    Route::post('/nelayan-profile', [NelayanController::class, 'update'])->name('nelayan.profile.update');
    Route::get('/detailpesanan', [PenyewaanController::class, 'detailpesanan'])->name('nelayan.detailpesanan');
    Route::get('/nelayan-barangkembali/{kode_sewa}/{jamkembali}/{jumlah}', [NelayanController::class, 'barangkembali'])->name('nelayan.barangkembali');
    Route::get('/history-pesanan', [NelayanController::class, 'historypesanan'])->name('nelayan.historypesanan'); 
>>>>>>> 87741116a1b3f5aedca64f3f527cf8212022e055
});