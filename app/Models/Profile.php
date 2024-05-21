<?php

namespace App\Models;

use App\Models\User;
use Database\Factories\ProfileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
	use HasFactory, SoftDeletes;

	protected $with = [];

	protected $guarded = [];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	protected static function newFactory()
	{
		return ProfileFactory::new();
	}

	protected function serializeDate(\DateTimeInterface $date)
	{
		return $date->format('Y-m-d H:i:s');
	}
}
