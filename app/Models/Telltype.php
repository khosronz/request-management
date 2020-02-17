<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Telltype
 * @package App\Models
 * @version February 17, 2020, 5:17 pm +0330
 *
 * @property string title
 * @property string desc
 */
class Telltype extends Model
{
    use SoftDeletes;

    public $table = 'telltypes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    
}
