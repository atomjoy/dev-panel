<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\RegisterUser;
use App\Events\RegisterUserMail;
use App\Events\RegisterUserMailError;
use App\Exceptions\JsonException;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;

class RegisterUserNotification
{
	public function handle(RegisterUser $event)
	{
		$this->sendEmail($event->user);
	}

	public function sendEmail(User $user)
	{
		if (config('apilogin.send_register_email', true)) {
			try {
				Mail::to($user)->locale(app()->getLocale())->send(
					new RegisterMail($user, $user->remember_token)
				);

				RegisterUserMail::dispatch($user);
			} catch (Exception $e) {
				report($e);
				RegisterUserMailError::dispatch($user);
				throw new JsonException(__("apilogin.register.email.error"), 422);
			}
		}
	}
}
