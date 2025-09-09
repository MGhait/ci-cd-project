<?php

use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/certificate/{user}/{course}', [CertificateController::class, 'generate'])->name('certificate');

// new line in master branche
