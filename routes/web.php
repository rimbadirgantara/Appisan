<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->name('frontPage.index');
Route::middleware(['guest'])->group(function() {
  
  // login
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::post('/login', [LoginController::class, 'doLogin']);
  
  // register
  Route::get('/register', [LoginController::class, 'register'])->name('register');
  Route::post('/register', [LoginController::class, 'doRegis']);
});

// admin
Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
  Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
  Route::post('/admin/profile/{id}/update', [AdminController::class, 'updateProfile']);
  Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
  
  Route::get('/admin/guru', [AdminController::class, 'tambahGuruPage'])->name('admin.guru');
  Route::post('/admin/users/tambah', [AdminController:: class, 'tambahUser']);
  Route::delete('/admin/guru/{id}/hapus', [AdminController::class, 'hapusUser']);
  Route::get('/admin/guru/{id}/edit', [AdminController::class, 'editUser']);
  Route::post('/admin/guru/{id}/doUpdate', [AdminController::class, 'doUpdateUser']);
  
  Route::get('/admin/siswa', [AdminController::class, 'tambahSiswaPage'])->name('admin.siswa');
  Route::delete('/admin/siswa/{id}/hapus', [AdminController::class, 'hapusSiswa']);
  Route::post('/admin/siswa/tambah', [AdminController:: class, 'tambahSiswa']);
  Route::get('/admin/siswa/{id}/edit', [AdminController::class, 'editSiswa']);
  Route::post('/admin/siswa/{id}/doUpdate', [AdminController::class, 'doUpdateSiswa']);

  Route::get('/admin/data-keputusan', [AdminController::class, 'dataKeputusan'])->name('admin.dataKeputusan');
  Route::delete('/admin/siswa/keputusan/{id}/hapus', [AdminController::class, 'hapusKalkulasi']);
});

// user
Route::group(['middleware' => ['auth', 'checklevel:guru']], function() {
  Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.index');

  Route::get('/guru/keputusan', [GuruController::class, 'halamanKeputusan'])->name('guru.keputusan');
  Route::get('/guru/hasil-keputusan', [GuruController::class, 'hasilKeputusan'])->name('guru.hasilKeputusan');
  Route::delete('/guru/hasil-keputusan/{id}/hapus', [GuruController::class, 'hasilKeputusanHapus']);
  Route::post('/guru/prekalkulasi', [GuruController::class, 'prekalkulasi']);
  Route::get('/guru/doKeputusan', [GuruController::class, 'doKeputusan']);
  Route::delete('/guru/prekalkulasi/{id}/hapus', [GuruController::class, 'hapusPrekalkulasi']);
  Route::get('/guru/profile', [GuruController::class, 'profile'])->name('guru.profile');
  Route::post('/guru/profile/{id}/update', [GuruController::class, 'updateProfile']);
  Route::post('/guru/siswa/tambah', [GuruController::class, 'tambahSiswa']);  
  Route::delete('/guru/siswa/{id}/hapus', [GuruController::class, 'hapusSiswa']);  
});

// logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
