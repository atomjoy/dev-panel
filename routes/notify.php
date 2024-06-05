<?php

use Illuminate\Support\Facades\Route;
use App\Notifications\messages\NotifyMessage;
use App\Notifications\DbNotify;
use App\Models\User;

Route::get('/notify', function () {

	// Add example notification for user
	$msg = new NotifyMessage();
	$msg->setContent('Hello max your links from us.');
	$msg->setLink('https://example.com/order/1', 'Last Order');
	$msg->setLink('https://example.com/promos', 'Promotions');

	$msg1 = new NotifyMessage();
	$msg1->setContent('Witaj! Twoja aplikacja została zaakceptowana. Zapraszamy na stronę sklepu.');

	// $user = User::first();
	$user = User::where('email', 'atomjoy.official@gmail.com')->first();
	$user->notify(new DbNotify($msg));
	$user->notifyNow(new DbNotify($msg1));

	return 'Ok';
});
