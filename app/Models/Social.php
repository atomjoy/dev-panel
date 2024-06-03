<?php

namespace App\Models;

use App\Models\User;
use Database\Factories\SocialFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Social extends Model
{
	use HasFactory;

	protected $with = [];

	protected $guarded = [];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	protected static function newFactory()
	{
		return SocialFactory::new();
	}

	protected function serializeDate(\DateTimeInterface $date)
	{
		return $date->format('Y-m-d H:i:s');
	}

	protected function casts(): array
	{
		return [];
	}
}
