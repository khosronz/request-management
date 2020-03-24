<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Setting
 * @package App\Models
 * @version March 24, 2020, 5:26 pm +0430
 *
 * @property \App\Models\User user
 * @property string title
 * @property string default
 * @property integer user_id
 * @property string short_code
 * @property string value
 * @property string desc
 */
class Setting extends Model
{
    use SoftDeletes;

    public $table = 'settings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'default',
        'user_id',
        'short_code',
        'value',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'default' => 'string',
        'user_id' => 'integer',
        'short_code' => 'string',
        'value' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'default' => 'required',
        'short_code' => 'required',
        'value' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
