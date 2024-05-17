<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Atomjoy\Sms\Notifications\OrderSms;
use Atomjoy\Sms\Notifications\SendSms;
use Illuminate\Support\Facades\Notification;

// Smsapi
Route::get('/sms', function () {
	try {
		$user = User::first();

		$user->notify(
			new SendSms(
				'New Order [%idzdo:smsapi.pl/panel%]',
				['48100100100', '48200200200']
			)
		);

		Notification::sendNow(
			$user,
			new OrderSms(
				'New Order [%idzdo:smsapi.pl/panel%]',
				['48100100100']
			)
		);
	} catch (\Exception $e) {
		// Resend from another channel if error
		return $e->getMessage();
	}

	return 'Message has been send.';
});
