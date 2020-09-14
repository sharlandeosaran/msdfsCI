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

    // public function userregions()
    // {
    //     $links = \App\UserBoard::where('user_id', $this->id)->pluck('region');
    //     return \App\Region::whereIn('letter', $links)->get();
    // }
    
    public function local_boards()
    {
        $list = [];
        foreach (\App\UserBoard::where('user_id', $this->id)->get() as $key => $value) {
            if ($value) {
                if ($value->local_board()) {
                    $list[] = $value->local_board()->local_board . ' (' . $value->local_board()->letter . ')';
                }
            }
        }
        asort($list);
        // dd($list);
        return $list;
    }

    public function getLocalBoardsAttribute($value)
    {
        $local_boards = '';
        $count = count($this->local_boards());
        foreach ($this->local_boards() as $i => $local_board ) {
            if ($count == count($this->local_boards())) {
                $local_boards .= $local_board;
            } else {
                if ($count > 1) {
                    $local_boards .= ', '.$local_board;
                } else {
                    $local_boards .= ' and '.$local_board;
                }
            }
            $count--;
        }

        return $local_boards;
    }
    
    public function local_board_array()
    {
        return \App\UserBoard::where('user_id', $this->id)->pluck('local_board')->toArray();
    }


}
