<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Equipment
 * @package App\Models
 * @version February 16, 2020, 12:17 pm +0330
 *
 * @property \App\User user
 * @property string title
 * @property string desc
 * @property integer product_visits
 * @property integer user_id
 */
class Equipment extends Model
{
    use SoftDeletes;

    public $table = 'equipment';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'desc',
        'product_visits',
        'status',
        'user_id',
        'category_id'
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'desc' => 'string',
        'product_visits' => 'integer',
        'user_id' => 'integer',
        'category_id' => 'integer'
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
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function comments()
    {
        return $this->hasMany('\App\Models\Comment')->orderBy('created_at','DESC');
    }
}
