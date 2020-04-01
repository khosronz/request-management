<?php

namespace App;

use App\Enums\UserType;
use App\Models\Category;
use App\Models\OrganizationCategory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'fname', 'lname', 'factory', 'province', 'city', 'address1', 'address2', 'phone', 'pre_phone', 'country', 'desc', 'visible_to_everyone','api_token'
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
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function cards()
    {
        return $this->hasMany('App\Models\Card');
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
    public function organizationCategories()
    {
        $organizations=$this->organizations()->pluck('organization_id');
        return OrganizationCategory::whereIn('organization_id',$organizations);
    }
    public function categories()
    {
        $categories=$this->organizationCategories()->pluck('category_id');
        return Category::whereIn('id',$categories);
    }

    public function isSuperadmin()
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            if ($role->id == UserType::superadmin) {
                return true;
            }
        }
        return false;
    }

    public
    function isMaster()
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            if ($role->id === UserType::master) {
                return true;
            }
        }
        return false;
    }

    public
    function isOwner()
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            if ($role->id === UserType::owner) {
                return true;
            }
        }
        return false;
    }

    public
    function isFinancial()
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            if ($role->id === UserType::financial) {
                return true;
            }
        }
        return false;
    }

    public
    function isProtection()
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            if ($role->id === UserType::protection) {
                return true;
            }
        }
        return false;
    }

    public
    function isSuccessor()
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            if ($role->id === UserType::successor) {
                return true;
            }
        }
        return false;
    }

    public
    function isSupport()
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            if ($role->id === UserType::support) {
                return true;
            }
        }
        return false;
    }

    public
    function isSupplier()
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            if ($role->id === UserType::supplier) {
                return true;
            }
        }
        return false;
    }

    public function sessions()
    {
        return $this->hasMany('App\Session');
//        return $this->hasMany('App\Session');
//        return DB::table('sessions')->where('user_id','=',$this->id)->get();
    }
}
