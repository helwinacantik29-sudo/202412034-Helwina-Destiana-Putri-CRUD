<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/mahasiswa');
Route::resource('mahasiswa', MahasiswaController::class);
