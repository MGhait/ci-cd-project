<?php

use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/certificate/{user}/{course}', [CertificateController::class, 'generate'])->name('certificate');

use App\Http\Controllers\LabReportController;

Route::get('/urine-analysis', [LabReportController::class, 'urineAnalysis']);
Route::get('/first', [LabReportController::class, 'showUrineAnalysis']);
Route::get('/lab-tests', [LabReportController::class, 'labTests']);

// new line in master branche
// new line in 07 branch

// edit here too same branch 17
// new line in 17 branch
