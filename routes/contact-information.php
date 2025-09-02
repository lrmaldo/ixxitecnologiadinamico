<?php

use App\Http\Controllers\Admin\ContactInformationController;
use Illuminate\Support\Facades\Route;

// Rutas existentes...

// Rutas de información de contacto
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/contact-information', [ContactInformationController::class, 'edit'])->name('contact-information.edit');
    Route::post('/contact-information', [ContactInformationController::class, 'update'])->name('contact-information.update');
});
