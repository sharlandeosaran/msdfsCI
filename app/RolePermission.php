<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
	
	public function role()
	{
		return $this->hasOne('App\Role', 'id', 'role_id');
	}
	
	public function status()
	{
		return $this->hasOne('App\Status', 'id', 'status_id');
	}
}
