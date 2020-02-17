<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Factoryaddress
 * @package App\Models
 * @version February 17, 2020, 5:19 pm +0330
 *
 * @property \App\Models\Factory factory
 * @property integer factory_id
 * @property string desc
 */
class Factoryaddress extends Model
{
    use SoftDeletes;

    public $table = 'factoryaddresses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'factory_id',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'factory_id' => 'integer',
        'desc' => 'string'
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
    public function factory()
    {
        return $this->belongsTo(\App\Models\Factory::class, 'factory_id', 'id');
    }
}
