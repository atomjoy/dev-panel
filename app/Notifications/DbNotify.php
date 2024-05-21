<?php

namespace App\Notifications;

use App\Notifications\Messages\NotifyMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DbNotify extends Notification
{
	use Queueable;

	public function __construct(
		protected NotifyMessage $msg
	) {
	}

	public function via(object $notifiable): array
	{
		return ['database'];
	}

	public function toArray(object $notifiable): array
	{
		return [
			'message' => $this->msg->getContent(),
			'links' => $this->msg->getLinks(),
		];
	}

	/**
	 * Get the notification's database type.
	 *
	 * @return string
	 */
	public function databaseType(object $notifiable): string
	{
		return 'db-notify';
	}
}
