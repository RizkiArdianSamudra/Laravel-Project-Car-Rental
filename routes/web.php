<?php

use App\Http\Controllers\MobilController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\user;
use App\Http\Middleware\admin;

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

Route::get('/', [MobilController::class, 'index']);
Route::get('/login', [MobilController::class, 'login']);
Route::post('/login', [MobilController::class, 'actionLogin']);
Route::get('/register', [MobilController::class, 'register']);
Route::post('/register', [MobilController::class, 'actionRegister']);

Route::middleware('user')->group(function () {
    Route::get('/dailycar', [MobilController::class, 'dailycar']);
    Route::get('/familycar', [MobilController::class, 'familycar']);
    Route::get('/sportcar', [MobilController::class, 'sportcar']);
    Route::get('/car-detail/{id_mobil}', [MobilController::class, 'carDetail']);
    Route::get('/car-pesan/{id_mobil}', [MobilController::class, 'carPesan']);
    Route::post('/car-pesan', [MobilController::class, 'carPesanAction']);
    Route::get('/berhasil-pesan', [MobilController::class, 'berhasilPesan']);
    Route::get('/logout', [MobilController::class, 'logout']);
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/logout', [AdminController::class, 'logout']);
    Route::get('/admin/profil-edit', [AdminController::class, 'profilEdit']);
    Route::get('/admin/car-booking', [AdminController::class, 'carBooking']);
    Route::get('/admin/car-booking/search', [AdminController::class, 'carBookingSearch']);
    Route::post('/admin/car-booking/iya', [AdminController::class, 'carBookingIya']);
    Route::post('/admin/car-booking/tidak', [AdminController::class, 'carBookingTidak']);
    Route::get('/admin/car-manager', [AdminController::class, 'carManager']);
    Route::get('/admin/car-manager/search', [AdminController::class, 'carManagerSearch']);
    Route::get('/admin/car-manager/tambah', [AdminController::class, 'carManagerTambah']);
    Route::post('/admin/car-manager/action', [AdminController::class, 'carManagerAction']);
    Route::get('/admin/car-manager/edit', [AdminController::class, 'carManagerEdit']);
    Route::put('/admin/car-manager/update', [AdminController::class, 'carManagerUpdate']);
    Route::delete('/admin/car-manager/delete', [AdminController::class, 'carManagerDelete']);
    Route::get('/admin/user-manager', [AdminController::class, 'userManager']);
    Route::get('/admin/user-manager/search', [AdminController::class, 'userManagerSearch']);
    Route::delete('/admin/user-manager/delete', [AdminController::class, 'userManagerDelete']);
    Route::get('/admin/admin-manager', [AdminController::class, 'adminManager']);
    Route::get('/admin/admin-manager/search', [AdminController::class, 'adminManagerSearch']);
    Route::get('/admin/admin-manager/tambah', [AdminController::class, 'adminManagerTambah']);
    Route::post('/admin/admin-manager/action', [AdminController::class, 'adminManagerAction']);
    Route::get('/admin/admin-manager/edit', [AdminController::class, 'adminManagerEdit']);
    Route::put('/admin/admin-manager/update', [AdminController::class, 'adminManagerUpdate']);
    Route::delete('/admin/admin-manager/delete', [AdminController::class, 'adminManagerDelete']);
    Route::get('/admin/brand-manager', [AdminController::class, 'brandManager']);
    Route::get('/admin/brand-manager/search', [AdminController::class, 'brandManagerSearch']);
    Route::get('/admin/brand-manager/tambah', [AdminController::class, 'brandManagerTambah']);
    Route::post('/admin/brand-manager/action', [AdminController::class, 'brandManagerAction']);
    Route::get('/admin/brand-manager/edit', [AdminController::class, 'brandManagerEdit']);
    Route::put('/admin/brand-manager/update', [AdminController::class, 'brandManagerUpdate']);
    Route::delete('/admin/brand-manager/delete', [AdminController::class, 'brandManagerDelete']);
});
