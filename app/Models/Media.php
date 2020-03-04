<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Media
 * @package App\Models
 * @version February 20, 2020, 10:57 pm +0330
 *
 * @property \App\Models\User user
 * @property integer user_id
 * @property string title
 * @property string desc
 * @property string alt
 * @property string url
 */
class Media extends Model
{
    use SoftDeletes;

    public $table = 'media';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'title',
        'desc',
        'alt',
        'url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'desc' => 'string',
        'alt' => 'string',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
