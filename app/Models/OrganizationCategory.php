<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrganizationCategory
 * @package App\Models
 * @version March 9, 2020, 4:55 pm +0330
 *
 * @property \App\Models\User user
 * @property \App\Models\Category category
 * @property \App\Models\Organization organization
 * @property integer user_id
 * @property integer category_id
 * @property integer organization_id
 */
class OrganizationCategory extends Model
{
    use SoftDeletes;

    public $table = 'organization_categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'category_id',
        'organization_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'category_id' => 'integer',
        'organization_id' => 'integer'
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
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function organization()
    {
        return $this->belongsTo(\App\Models\Organization::class, 'organization_id', 'id');
    }
}
