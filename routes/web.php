<?php

use Illuminate\Support\Facades\Route;

// 1. CARA PÚBLICA (Ciudadanos) - http://localhost
Route::get('/', function () {
    return view('welcome');
});


// 2. CARA PRIVADA (Ayuntamiento) - http://admin.localhost
Route::domain('admin.localhost')->group(function () {
    
    // El panel de control protegido de Jetstream
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

});