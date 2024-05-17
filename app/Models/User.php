<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Contracts\Spatie\HasRolesPermissions;
use App\Contracts\HasProfilAddress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Cashier\Billable;
// use Illuminate\Support\Facades\Notification;

class User extends Authenticatable
{
	use HasFactory, Notifiable;
	use HasRoles, HasPermissions;
	use HasRolesPermissions, HasProfilAddress;
	use Billable;

	/**
	 * Model table.
	 */
	protected $table = 'users';

	/**
	 * Auth guard.
	 */
	protected $guard = 'web';

	/**
	 * Append user relations (optional).
	 */
	protected $with = ['profile', 'roles'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array
	{
		return [
			'email_verified_at' => 'datetime',
			'password' => 'hashed',
		];
	}

	protected function getDefaultGuardName(): string
	{
		return 'web';
	}
}
