<?php

use App\Http\Controllers\Stripe\WebhookController;
use Illuminate\Support\Facades\Route;

Route::post('/stripe/webhook', WebhookController::class);
// Route::post('/stripe/webhook', WebhookController::class)->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class);
