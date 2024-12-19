<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KebunController;

Route::view('/','homeView/home');

Route::view('/tes','viewAdmin.timbangan.index');

Route::resource('kebun', KebunController::class);