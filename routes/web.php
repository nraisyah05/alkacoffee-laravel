<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;

Route::get('/', function () {
    return view('welcome');
});

//General
//Home
Route::get('home', [HomeController::class, 'index'])->name('home');
// Route::get('home/loginadmin', [HomeController::class, 'loginadmin'])->name('loginadmin');

//Auth
Route::get('home/login', [AuthController::class, 'index'])->name('login.admin');
Route::post('home/login/check', [AuthController::class, 'login'])->name('login.admin.check');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/auth/redirect-google', [AuthController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('/oauthcallback', [AuthController::class, 'handleGoogleCallback']);

//middleware
Route::group(['middleware' => ['checkislogin']], function () {
    //Admin
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //pelanggan
    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.list');
    Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');

    Route::get('pelanggan/edit/{param1}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::post('pelanggan/update', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::get('pelanggan/destroy/{param1}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

    //mitra
    Route::get('mitra', [MitraController::class, 'index'])->name('mitra.list');
    Route::get('mitra/create', [MitraController::class, 'create'])->name('mitra.create');
    Route::post('mitra/store', [MitraController::class, 'store'])->name('mitra.store');

    Route::get('mitra/edit/{param1}', [MitraController::class, 'edit'])->name('mitra.edit');
    Route::post('mitra/update', [MitraController::class, 'update'])->name('mitra.update');
    Route::get('mitra/destroy/{param1}', [MitraController::class, 'destroy'])->name('mitra.destroy');

    //Asset
    Route::get('asset', [AssetController::class, 'index'])->name('asset.list');
    Route::get('asset/create', [AssetController::class, 'create'])->name('asset.create');
    Route::post('asset/store', [AssetController::class, 'store'])->name('asset.store');

    Route::get('asset/edit/{param1}', [AssetController::class, 'edit'])->name('asset.edit');
    Route::post('asset/update', [AssetController::class, 'update'])->name('asset.update');
    Route::get('asset/destroy/{param1}', [AssetController::class, 'destroy'])->name('asset.destroy');

    //Middleware User
    Route::group(['middleware' => ['checkrole:Super Administrator']], function () {
        //user
        Route::get('user', [UserController::class, 'index'])->name('user.list');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user/store', [UserController::class, 'store'])->name('user.store');

        Route::get('user/edit/{param1?}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('user/update', [UserController::class, 'update'])->name('user.update');
        Route::get('user/destroy/{param1?}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::prefix('pembayaran')->group(function () {
        Route::get('/', [PembayaranController::class, 'index'])->name('pembayaran.index');
        Route::post('/tambah', [PembayaranController::class, 'tambahKeranjang'])
            ->name('pembayaran.tambah');
        Route::post('/simpan',[PembayaranController::class,'simpan'])->name('pembayaran.simpan');
        Route::get('/struk/{id}', [PembayaranController::class, 'struk'])->name('pembayaran.struk');
        Route::get('/struk/pdf/{id}', [PembayaranController::class, 'strukPdf'])->name('pembayaran.struk.pdf');
    });

    //Produk
    Route::get('produk', [ProdukController::class, 'index'])->name('produk.list');
    Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('produk/store', [ProdukController::class, 'store'])->name('produk.store');

    Route::get('produk/edit/{param1}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::post('produk/update', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('produk/destroy/{param1}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    //Produk
    Route::get('kasir', [KasirController::class, 'index'])->name('kasir.list');
    Route::get('kasir/create', [KasirController::class, 'create'])->name('kasir.create');
    Route::post('kasir/store', [KasirController::class, 'store'])->name('kasir.store');

    Route::get('kasir/edit/{param1}', [KasirController::class, 'edit'])->name('kasir.edit');
    Route::post('kasir/update', [KasirController::class, 'update'])->name('kasir.update');
    Route::get('kasir/destroy/{param1}', [KasirController::class, 'destroy'])->name('kasir.destroy');
});
