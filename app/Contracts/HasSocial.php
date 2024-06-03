<?php

namespace App\Contracts;

use App\Models\Social;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasSocial
{
	/**
	 * Get the social associated with the user.
	 */
	public function social(): HasMany
	{
		return $this->hasMany(Social::class);
	}
}
