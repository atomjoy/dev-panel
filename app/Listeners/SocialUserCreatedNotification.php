<?php

namespace App\Listeners;

use App\Models\Profile;
use App\Models\User;
use Atomjoy\Socialites\Events\UserCreated;

class SocialUserCreatedNotification
{
	public function handle(UserCreated $event)
	{
		$this->createProfile($event->user);
	}

	public function createProfile(User $user)
	{
		$profil = Profile::where('user_id', $user->id)->first();

		if (!$profil instanceof Profile) {
			Profile::create([
				'user_id' => $user->id,
				'name' => uniqid('name-'),
				'username' => uniqid('user.'),
			])->save();
		}
	}
}
