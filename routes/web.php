<?php

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
