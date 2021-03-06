<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // --------------------------------- attributes --------------------------------------------------------------------

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // --------------------------------- relationships -----------------------------------------------------------------

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_users');
    }

    // --------------------------------- methods -----------------------------------------------------------------------

    public function hasRole($name)
    {
        if (! $this->roles) {
            return false;
        }

        return (bool)$this->roles->where('name', $name)->count();
    }
}
