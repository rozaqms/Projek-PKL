<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardsController;
use PDFMake\Pdf;


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
Route::get('/login', function () {
    return view('login',[
        "title" => "Login"
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" => "About"
    ]);
});

Route::get('/support', function () {
    return view('support',[
        "title" => "Support"
    ]);
});

//dashboard
Route::get('/',[DashboardsController::class, 'index'])->name('dashboard');
Route::get('/get',[DashboardsController::class, 'getData']);
Route::get('/{period}', [DashboardsController::class, 'getPengeluaranByPeriod']);

//menu
Route::get('/pages/stock-barang',[MenuController::class, 'stockB'])->name('stockB');
Route::get('/pages/penjualan',[MenuController::class, 'penjualanM'])->name('penjualanM');
Route::post('/pages/insert-data-menu',[MenuController::class, 'simpandatamenu'])->name('simpandatamenu');
Route::get('/pages/{id}/edit-data-menu',[MenuController::class, 'edit'])->name('editdatamenu');
Route::get('/pages/stock-barang/{id}',[MenuController::class, 'delete'])->name('deletedatamenu');
Route::post('/pages/{id}/edit-data-menu',[MenuController::class, 'update'])->name('updatedatamenu');

//transaksi
Route::get('/pages/transaksi/penjualan'  ,[TransaksiController::class, 'penjualan']);
Route::get('/pages/transaksi/pendapatan',[TransaksiController::class, 'pendapatan']);
Route::get('/pages/laba_rugi',[TransaksiController::class, 'labarugi']);
Route::get('/pages/pembelian-bahan',[TransaksiController::class, 'pengeluaran']);
Route::get('/pages/transaksi/pendapatan/laporan/{key}/'  ,[TransaksiController::class, 'laporanK']);
Route::post('/simpan/pengeluaran',[TransaksiController::class, 'pengeluaranT'])->name('pengeluaranT');
Route::post('/laporan',[TransaksiController::class, 'laporanT'])->name('laporanT');

//produk
Route::post('/save_changes', [ProductController::class,'saveChanges'])->name('saveChanges');


//manage
Route::get('/account/{name}/',[ManageController::class, 'show'])->name('showprofileM');
Route::post('/atur-target', [ManageController::class ,'aturtarget'])->name('aturtarget');
Route::get('/pages/users',[ManageController::class, 'users'])->name('usersM');
Route::get('pages/manage',[ManageController::class, 'settings'])->name('settingsM');
Route::get('/account/myprofile', [ManageController::class, 'showMy']);
