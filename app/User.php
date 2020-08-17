<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'surname', 'role_id', 'active', 'last_online', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getNameAttribute($value)
    {
        return $this->attributes['first_name'] .' '. $this->attributes['surname'];
    }

    public function getRoleAttribute($value)
    {
        return \App\Role::find($this->attributes['role_id']);
    }

    public function getAdminAttribute($value)
    {
        return $this->attributes['role_id'] == 1;
    }

    public function getLastOnlineAttribute($value)
    {
        return $this->attributes['last_online']? $this->attributes['last_online'] : 'never';
    }

    public function history()
    {
        $list = \App\UserAudit::where('user_id', $this->id)->get();
        return $list->sortByDesc('created_at');
    }

    public function getRolePermissionsAttribute($value)
    {
        return \App\RolePermission::
                where('role_id', $this->role_id)->
                pluck('status_id')->
                toArray();
    }

    public function userregions()
    {
        $links = \App\UserRegion::where('user_id', $this->id)->pluck('region_id');
        return \App\Region::whereIn('id', $links)->get();
    }
    
    public function regions()
    {
        $list = [];
        foreach (\App\UserRegion::where('user_id', $this->id)->get() as $key => $value) {
            if ($value) {
                $sub = \App\Region::find($value->region);
                if ($sub) {
                    $list[] = $sub->region;
                }
            }
        }
        asort($list);
        return $list;
    }
    
    public function region_id()
    {
        return \App\UserRegion::where('user_id', $this->id)->pluck('region_id');
    }


}
