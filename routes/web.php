<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/whoami', function () {
    return 'Renan James Z. Miranda| 2023-70705 | Block 4C | ITRACKB4 Laravel 12';
});

Route::get('/medicines/filter/{type?}', function($type = 'all'){
    return redirect()->route('medicines.index', ['type' => $type]);
})
 -> name('medicines.filter');


Route::resource('medicines', MedicineController::class)
    ->middlewareFor(['create', 'store', 'edit', 'update', 'destroy'], 'auth');


Route::get('/register',  [RegisterController::class, 'create'])
->name('register');

Route::post('/register', [RegisterController::class, 'store'])
->name('register.store');


Route::get('/login',   [LoginController::class, 'create'])->name('login');
Route::post('/login',  [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

