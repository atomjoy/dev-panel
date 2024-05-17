<?php

use App\Http\Controllers\ActivateController;

Route::get('/activate/{id}/{code}', [ActivateController::class, 'index'])->name('activation');

Route::get('/login', function () {
	return view('welcome');
})->name('login');
