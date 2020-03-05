<?php

namespace App;

use App\Enums\UserType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name', 'email', 'password', 'fname','lname','factory','province','city','address1','address2','phone','pre_phone','country','desc','api_token'
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

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
    public function medias()
    {
        return $this->hasMany('App\Models\Media');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_users', 'user_id', 'role_id');
    }

    public function organizations()
    {
        return $this->belongsToMany('App\Models\Organization', 'organization_users', 'user_id', 'organization_id');
    }

    public function isSuperadmin()
    {
        foreach ($this->roles as $role){
            if ($role->id === UserType::superadmin){
                return true;
            }
        }
        return false;
    }
    public function isMaster()
    {
        foreach ($this->roles as $role){
            if ($role->id === UserType::master){
                return true;
            }
        }
        return false;
    }

    public function isOwner()
    {
        foreach ($this->roles as $role){
            if ($role->id === UserType::owner){
                return true;
            }
        }
        return false;
    }
    public function isFinancial()
    {
        foreach ($this->roles as $role){
            if ($role->id === UserType::financial){
                return true;
            }
        }
        return false;
    }

    public function isProtection()
    {
        foreach ($this->roles as $role){
            if ($role->id === UserType::protection){
                return true;
            }
        }
        return false;
    }
    public function isSuccessor()
    {
        foreach ($this->roles as $role){
            if ($role->id === UserType::successor){
                return true;
            }
        }
        return false;
    }
    public function isSupport()
    {
        foreach ($this->roles as $role){
            if ($role->id === UserType::support){
                return true;
            }
        }
        return false;
    }
    public function isSupplier()
    {
        foreach ($this->roles as $role){
            if ($role->id === UserType::supplier){
                return true;
            }
        }
        return false;
    }
}
