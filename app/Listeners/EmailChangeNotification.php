<?php

namespace App\Listeners;

use Exception;
use App\Models\User;
use App\Events\EmailChange;
use App\Events\EmailChangeMail;
use App\Events\EmailChangeMailError;
use App\Exceptions\JsonException;
use App\Mail\ChangeMail;
use Illuminate\Support\Facades\Mail;

class EmailChangeNotification
{
	public function handle(EmailChange $event)
	{
		$this->sendEmail($event->user, $event->code);
	}

	public function sendEmail(User $user, $code)
	{
		if (config('apilogin.send_email_change_email', true)) {
			try {
				Mail::to($user)->locale(app()->getLocale())->send(new ChangeMail($user, $code));
				EmailChangeMail::dispatch($user);
			} catch (Exception $e) {
				report($e);
				EmailChangeMailError::dispatch($user);
				throw new JsonException(__("apilogin.email.change.email.error"), 422);
			}
		}
	}
}
