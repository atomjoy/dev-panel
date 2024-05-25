<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Admin\F2aController as AdminF2aController;
use App\Http\Controllers\Auth\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Auth\Admin\PasswordResetController as AdminPasswordResetController;
use App\Http\Controllers\Auth\Admin\LoggedController as AdminLoggedController;
use App\Http\Controllers\Auth\Admin\LogoutController as AdminLogoutController;
use App\Http\Controllers\Auth\Admin\PasswordChangeController as AdminPasswordChangeController;
use App\Http\Controllers\Auth\Admin\UploadAvatarController as AdminUploadAvatarController;

Route::prefix('web/api/admin')->name('web.api.admin')->middleware([
	'web', 'forcejson',
])->group(function () {
	// Public routes
	Route::post('/login', [AdminLoginController::class, 'index'])->name('login');
	Route::post('/password', [AdminPasswordResetController::class, 'index'])->name('password');
	Route::get('/logout', [AdminLogoutController::class, 'index'])->name('logout');
	Route::get('/logged', [AdminLoggedController::class, 'index'])->name('logged');
	Route::post('/f2a', [AdminF2aController::class, 'index'])->name('f2a');

	// Private admin, worker routes (guard admin)
	Route::middleware([
		'auth:admin', 'ban_admin',
		'role:' . config(
			'allowed_worker_roles',
			'super_admin|admin|worker'
		) . ',admin'
	])->group(function () {
		// Admin, worker routes
		Route::post('/password/change', [AdminPasswordChangeController::class, 'index'])->name('change');
		Route::post('/f2a/enable', [AdminF2aController::class, 'enable'])->name('f2a.enable');
		Route::post('/f2a/disable', [AdminF2aController::class, 'disable'])->name('f2a.disable');
		Route::post('/upload/avatar', [AdminUploadAvatarController::class, 'index'])->name('upload.avatar');
		Route::post('/remove/avatar', [AdminUploadAvatarController::class, 'remove'])->name('remove.avatar');

		Route::get('/test', function () {
			return response()->json(['message' => 'Authenticated.']);
		})->middleware('throttle:20,1'); // 20/1min
	});

	// Private admin routes (guard admin)
	Route::middleware([
		'auth:admin', 'ban_admin',
		'role:' . config(
			'allowed_admin_roles',
			'super_admin|admin'
		) . ',admin'
	])->group(function () {
		// Admin only routes

		Route::get('/test/admin', function () {
			return response()->json(['message' => 'Authenticated.']);
		})->middleware('throttle:20,1'); // 20/1min
	});
});
