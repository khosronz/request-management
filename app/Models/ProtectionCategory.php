<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProtectionCategory
 * @package App\Models
 * @version March 5, 2020, 4:41 pm +0330
 *
 * @property \App\Models\Category category
 * @property \App\Models\User user
 * @property integer category_id
 * @property integer user_id
 */
class ProtectionCategory extends Model
{
    use SoftDeletes;

    public $table = 'protection_categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'category_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'category_id' => 'integer',
        'user_id' => 'integer'
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
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
