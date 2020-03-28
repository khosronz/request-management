<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comment
 * @package App\Models
 * @version March 28, 2020, 8:35 am +0430
 *
 * @property \App\Models\Equipment equipment
 * @property \App\Models\User user
 * @property \App\Models\Comment parent
 * @property integer equipment_id
 * @property integer user_id
 * @property string title
 * @property string desc
 * @property string user_ip_address
 * @property string email
 * @property integer parent_id
 * @property string status
 */
class Comment extends Model
{
    use SoftDeletes;

    public $table = 'comments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'equipment_id',
        'user_id',
        'title',
        'desc',
        'user_ip_address',
        'email',
        'parent_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'equipment_id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'desc' => 'string',
        'user_ip_address' => 'string',
        'email' => 'string',
        'parent_id' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'user_ip_address' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function equipment()
    {
        return $this->belongsTo(\App\Models\Equipment::class, 'equipment_id', 'id');
    }

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
    public function parent()
    {
        return $this->belongsTo(\App\Models\Comment::class, 'parent_id', 'id');
    }
}
