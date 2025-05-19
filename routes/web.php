<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/partner/form', [\App\Http\Controllers\PartnerController::class, 'form'])->name('partner.form');

Route::post('/partner/store', [\App\Http\Controllers\PartnerController::class, 'store'])->name('partner.store');
