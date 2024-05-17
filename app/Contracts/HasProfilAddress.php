<?php

namespace App\Contracts;

use App\Models\Address;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasProfilAddress
{
	/**
	 * Get the profile associated with the user.
	 */
	public function address(): HasOne
	{
		return $this->hasOne(Address::class);
	}

	/**
	 * Get the profile associated with the user.
	 */
	public function profile(): HasOne
	{
		return $this->hasOne(Profile::class);
	}
}
