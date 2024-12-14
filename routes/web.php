<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KebunController;

Route::get('/', function () {return view('welcome');});
Route::resource('kebun', KebunController::class);