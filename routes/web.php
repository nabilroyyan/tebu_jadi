<?php

use App\Http\Controllers\TbHutangController;
use App\Http\Controllers\TbTransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KebunController;

Route::view('/', 'homeView/home');

Route::view('/tes', 'viewAdmin.timbangan.index');



route::get('/kebun', [KebunController::class, 'index']);

route::view('/kebun-create', 'viewAdmin.kebun.create');
// Route::post('/kebun-store', [KebunController::class, 'store']);
Route::post('/kebun-store', [KebunController::class, 'store']);
Route::get('/kebun/{id}/edit', [KebunController::class, 'edit']);
Route::post('/kebun/{id}/update', [KebunController::class, 'update']);
Route::get('/kebun/{id}/delete', [KebunController::class, 'delete']);
Route::resource('hutangs', TbHutangController::class);
Route::resource('transaksis', TbTransaksiController::class);
Route::get('api/hutangs', [TbHutangController::class, 'apiIndex']);
Route::put('api/hutangs/{id}', [TbHutangController::class, 'update']);
Route::get('api/transaksis', [TbTransaksiController::class, 'apiIndex']);
Route::put('api/transaksis/{id}', [TbTransaksiController::class, 'updateStatus']);
Route::get('transaksis/{id}', [TbTransaksiController::class, 'show']);
Route::get('/kebun/{id}/delete', [KebunController::class, 'destroy']);
