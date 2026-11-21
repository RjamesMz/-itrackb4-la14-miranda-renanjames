<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/whoami', function () {
    return 'Renan James Z. Miranda| 2023-70705 | Block 4C | ITRACKB4 Laravel 12';
});

Route::get('/medicines/filter/{type?}', function($type = 'all'){
    return redirect()->route('medicines.index', ['type' => $type]);
})
 -> name('medicines.filter');


Route::resource('medicines', MedicineController::class);

Route::get('/register',  [RegisterController::class, 'create'])
->name('register');

Route::post('/register', [RegisterController::class, 'store'])
->name('register.store');



