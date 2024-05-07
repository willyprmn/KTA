<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\CriteriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'customer']);

// Route::group(['middleware' => 'auth'], function () {
      Route::get('/dashboard', [DashboardController::class, 'index']);
      Route::get('/profil', [AuthController::class, 'profil']);
      Route::post('/profil', [AuthController::class, 'updateProfil']);

      // admin
      // Route::resource('bank', BankController::class);
      // Route::get('/kriteria', [CriteriaController::class, 'index']);
      // Route::get('/proses/{id}', [CriteriaController::class, 'proses']);
      // Route::post('/terima', [CriteriaController::class, 'terima']);
      // Route::post('/tolak', [CriteriaController::class, 'tolak']);
      // Route::post('/pilih', [CriteriaController::class, 'pilih']);
      // Route::get('/cetak/{$id}', [CriteriaController::class, 'generatePdf']);

      // customer
      Route::resource('pengajuan', SubmissionController::class);
// });

// Route::group(function () {
//       // admin
//       Route::resource('bank', BankController::class);
//       Route::get('/kriteria', [CriteriaController::class, 'index']);
//       Route::get('/proses/{id}', [CriteriaController::class, 'proses']);
//       Route::post('/terima', [CriteriaController::class, 'terima']);
//       Route::post('/tolak', [CriteriaController::class, 'tolak']);
//       Route::post('/pilih', [CriteriaController::class, 'pilih']);
// })->middleware([AdminRole::class]);

// Route::group(['middleware' => 'customer'], function () {
//       // customer
//       Route::resource('pengajuan', SubmissionController::class);
// });

// Route::middleware([AdminRole::class])->group(function () {
      Route::resource('bank', BankController::class);
      Route::get('/kriteria', [CriteriaController::class, 'index']);
      Route::get('/proses/{id}', [CriteriaController::class, 'proses']);
      Route::post('/terima', [CriteriaController::class, 'terima']);
      Route::post('/tolak', [CriteriaController::class, 'tolak']);
      Route::post('/pilih', [CriteriaController::class, 'pilih']);
      Route::get('/cetak/{id}', [CriteriaController::class, 'generatePdf']);

// });