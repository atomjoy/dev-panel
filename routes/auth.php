<?php

use App\Http\Controllers\Auth\ActivateController;

Route::get('/activate/{id}/{code}', [ActivateController::class, 'index'])->name('activation');

Route::get('/login', function () {
	return view('welcome');
})->name('login');
