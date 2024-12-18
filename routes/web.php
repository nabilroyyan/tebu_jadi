<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KebunController;

Route::view('/','homeView/home');

Route::resource('kebun', KebunController::class);