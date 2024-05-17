<?php

namespace App\Contracts\Spatie;

trait HasRolesPermissions
{
	/**
	 * Spatie roles with permissions
	 */
	public function roles_permissions()
	{
		return $this->roles()->with(['permissions' => function ($q) {
			$q->select('id', 'name', 'guard_name');
		}]);
	}
}
