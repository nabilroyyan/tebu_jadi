<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KebunController;
use App\http\Controllers\TimbanganController;

Route::view('/', 'homeView/home');

Route::view('/tes', 'viewAdmin.timbangan.index');



route::get('/kebun', [KebunController::class, 'index']);

route::view('/kebun-create', 'viewAdmin.kebun.create');
// Route::post('/kebun-store', [KebunController::class, 'store']);
Route::post('/kebun-store', [KebunController::class, 'store']);
Route::get('/kebun/{id}/edit', [KebunController::class, 'edit']);
Route::post('/kebun/{id}/update', [KebunController::class, 'update']);
Route::get('/kebun/{id}/delete', [KebunController::class, 'destroy']);



Route::get('/timbangan', [TimbanganController::class, 'index'])->name('timbangan.index');
Route::post('/timbangan', [TimbanganController::class, 'store'])->name('timbangan.store');
Route::get('/timbangan/{id}/edit', [TimbanganController::class, 'edit'])->name('timbangan.edit');
Route::put('/timbangan/{id}', [TimbanganController::class, 'update'])->name('timbangan.update');
Route::delete('/timbangan/{id}', [TimbanganController::class, 'destroy'])->name('timbangan.destroy');