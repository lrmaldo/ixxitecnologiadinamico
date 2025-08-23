<?php

use App\Livewire\Testimonials\Index as TestimonialsIndex;
use App\Livewire\Testimonials\Show as TestimonialsShow;
use Illuminate\Support\Facades\Route;

// Páginas principales
Route::view('/', 'welcome')->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de testimonios
Route::get('testimonios', TestimonialsIndex::class)->name('testimonios.index');
Route::get('testimonios/{id}', TestimonialsShow::class)->name('testimonios.show');

// Incluir rutas de autenticación
require __DIR__.'/auth.php';
