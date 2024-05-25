<?php

use Illuminate\Support\Facades\Route;

// Auth User
require 'auth-web.php';
// Auth Admin
require 'auth-admin.php';
// Stripe
require 'stripe.php';
// Sms
require 'sms.php';

// Main page
Route::get('/', function () {
	return view('welcome');
});

Route::get('/services', function () {
	return view('welcome');
});

Route::get('/about', function () {
	return view('welcome');
});

if (!app()->runningUnitTests()) {
	// Fallback route
	Route::fallback(function () {
		// Enable vue-router fallback without 404 error code
		return view('welcome');

		// Error page 404 code
		// return abort(404);
	});
}
