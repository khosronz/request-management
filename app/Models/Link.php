<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Link
 * @package App\Models
 * @version March 31, 2020, 12:01 pm +0430
 *
 * @property \App\Models\User user
 * @property string title
 * @property string url
 * @property string expression
 * @property string desc
 * @property integer user_id
 */
class Link extends Model
{
    use SoftDeletes;

    public $table = 'links';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'url',
        'expression',
        'desc',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'url' => 'string',
        'expression' => 'string',
        'desc' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'url' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
