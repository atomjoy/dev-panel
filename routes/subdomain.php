<?php

use Illuminate\Support\Facades\Route;

Route::domain('{subdomain}.laravel.test')->group(function () {
	// File
	Route::get('/account/google.html');

	Route::get('/account/google',  function () {
		return url()->current();
	});

	Route::get('/', function (string $subdomain) {
		return "Welcome to the $subdomain subdomain.";
	});

	Route::fallback(function ($request) {
		// Full URL, with query string
		$request->fullUrl();
		// Just the path part of the URL
		$request->path();
		// Just the root (protocol and domain) part of the URL)
		$request->root();

		$path = request()->url();
		$file = basename($path);         // $file is set to "index.php"
		$file = basename($path, ".php"); // $file is set to "index"

		$url = 'http://atomjoy.pl/images/logo.png';
		// $file = file_get_contents($url); // To get file
		// $name = basename($url); // To get file name
		// $ext = pathinfo($url, PATHINFO_EXTENSION); // To get extension
		// $name2 = pathinfo($url, PATHINFO_FILENAME); // File name without extension

		return url()->current();
	});
});

Route::domain('{account}.example.com')->group(function () {
	Route::get('/', function ($account) {
		return "Welcome to the $account subdomain.";
	});
});

// server {
//     listen 80;
//     server_name *.example.com;
//     root /var/www/example.com/public;
//     index index.php index.html;
// }

// config/filesystem.php
// 'public_html' => [
//     'driver' => 'local',
//     'root' => '/home/onomy/public_html/storage',
//     'url' => env('PUBLIC_URL').'/storage', // should point to your main project
//     'visibility' => 'public',
// ],

// <!-- Google tag (gtag.js) pomoc.example.org -->
// <script async src="https://www.googletagmanager.com/gtag/js?id=G-6P02Q3J1YX"></script>
// <script>
//   window.dataLayer = window.dataLayer || [];
//   function gtag(){dataLayer.push(arguments);}
//   gtag('js', new Date());

//   gtag('config', 'G-6P02Q3J1YX');
// </script>
