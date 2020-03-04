<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RoleUser
 * @package App\Models
 * @version March 4, 2020, 7:15 pm +0330
 *
 * @property \App\Models\User user
 * @property \App\Models\Role role
 * @property integer user_id
 * @property integer role_id
 */
class RoleUser extends Model
{
    use SoftDeletes;

    public $table = 'role_users';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id', 'id');
    }
}
