<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/root', [App\Http\Controllers\Root\Dashboard\DashboardController::class, 'index'])->middleware('root');
    Route::get('/admin', [App\Http\Controllers\Admin\Home\HomeController::class, 'index'])->middleware('admin');
});

// Route::middleware(['auth', 'root'], function() {
//     Route::get('/home', [App\Http\Controllers\Root\Dashboard\DashboardController::class, 'index'])->name('home');
// });

// Route::middleware(['auth', 'admin'], function() {
//     Route::get('/home', [App\Http\Controllers\Admin\Home\HomeController::class, 'index'])->name('home');
// });

// Route::group(['middleware' => ['auth:sanctum', 'verified', 'checkRole:admin']], function() {
//     Route::get('/home', [App\Http\Controllers\Admin\Home\HomeController::class, 'index'])->name('home');
// });

// Route::group(['middleware' => ['auth:sanctum', 'verified', 'checkRole:root']], function() {
//     Route::get('/dashboard', function() {
//         return view('dashboard');
//     })->name('dashboard');
//     Route::get('gedung', Gedungs::class)->name('gedung');
//     Route::get('unit', UnitKerjas::class)->name('unit');
//     Route::get('ruang', Ruangs::class)->name('ruang');
//     Route::get('kodebarang', KodeBarangs::class)->name('kodebarang');
//     Route::get('barang', Barangs::class)->name('barang');
//     Route::get('dbr', Dbr::class)->name('dbr');
//     Route::get('user', Users::class)->name('user');
// });
