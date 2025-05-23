<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/partner/form', [\App\Http\Controllers\PartnerController::class, 'form'])->name('partner.form');
Route::post('/partner/save', [\App\Http\Controllers\PartnerController::class, 'store'])->name('partner.store');
Route::get('/partner', [\App\Http\Controllers\PartnerController::class, 'index'])->name('partner.index');

Route::post('/get-regency', [RegionController::class, 'getRegencie'])->name('getRegency');
Route::post('/get-district', [RegionController::class, 'getDistrict'])->name('getDistrict');
Route::post('/get-village', [RegionController::class, 'getVillage'])->name('getVillage');

Route::prefix('master')->group(function () {
    Route::get('/kategori', [\App\Http\Controllers\PartnerCategoryController::class, 'index'])->name('partner.category.index');

});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
