<?php

use App\Http\Controllers\TbHutangController;
use App\Http\Controllers\TbTransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KebunController;
use App\Http\Controllers\RolePermissionController;
use App\http\Controllers\TimbanganController;
use App\Http\Controllers\UserController;

Route::view('/', 'homeView/home')->middleware('guest');

Route::view('/tes', 'viewAdmin.timbangan.index');

Auth::routes();



Route::middleware('auth')->group(function() {


Route::get('/dashboard', function() {
    return view('viewAdmin.dashboard');
});
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

Route::get('/timbangan', [TimbanganController::class, 'index'])->name('timbangan.index');
Route::get('/timbangan-create', [TimbanganController::class, 'create'])->name('timbangan.create');
Route::post('/timbangan-store', [TimbanganController::class, 'store'])->name('timbangan.store');
Route::get('/kebun-details/{id}', [TimbanganController::class, 'getKebunDetails']);
Route::get('/timbangan/{id}/edit', [TimbanganController::class, 'edit'])->name('timbangan.edit');
Route::post('/timbangan/{id}/update', [TimbanganController::class, 'update'])->name('timbangan.update');
Route::delete('/timbangan/{id}', [TimbanganController::class, 'destroy'])->name('timbangan.destroy');


Route::controller(UserController::class)->prefix('/user')->group(function() {
    Route::get('/','index')->name('user.index');
    Route::get('/create','create')->name('user.create');
    Route::post('/','store')->name('user.store');
    Route::get('/edit/{id}','edit')->name('user.edit');
    Route::put('/update/{id}','update')->name('user.update');
    Route::delete('/delete/{id}','destroy')->name('user.delete');
});

Route::controller(RolePermissionController::class)->prefix('/role')->group(function() {
    Route::get('/', 'getRole')->name('role.getRole');
    Route::post('', 'storeRole')->name('role.store');
    Route::put('/{id}', 'updateRole')->name('role.update');
    Route::get('/{role}/permissions', 'managePermissions')->name('role.managePermissions');
    Route::delete('/{id}', 'destroyRole')->name('role.destroy');
    Route::post('/{roleId}/permissions', 'assignPermission')->name('role.assignPermission');
    Route::delete('/{roleId}/permissions/{permissionId}', 'revokePermission')->name('role.revokePermission');
});

Route::controller(RolePermissionController::class)->prefix('/permission')->group(function() {
    Route::get('/', 'getPermission')->name('permission.getPermission');
    Route::post('/permissions', 'storePermission')->name('permission.store');
});

});
