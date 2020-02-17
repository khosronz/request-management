<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Factorytell
 * @package App\Models
 * @version February 17, 2020, 5:18 pm +0330
 *
 * @property \App\Models\Factory factory
 * @property \App\Models\Telltype telltype
 * @property string title
 * @property string tellnumber
 * @property string desc
 * @property integer factory_id
 * @property integer telltype_id
 */
class Factorytell extends Model
{
    use SoftDeletes;

    public $table = 'factorytells';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'tellnumber',
        'desc',
        'factory_id',
        'telltype_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'tellnumber' => 'string',
        'desc' => 'string',
        'factory_id' => 'integer',
        'telltype_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'tellnumber' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function factory()
    {
        return $this->belongsTo(\App\Models\Factory::class, 'factory_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function telltype()
    {
        return $this->belongsTo(\App\Models\Telltype::class, 'telltype_id', 'id');
    }
}
