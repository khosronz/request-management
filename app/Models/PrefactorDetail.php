<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PrefactorDetail
 * @package App\Models
 * @version March 10, 2020, 7:15 pm +0330
 *
 * @property \App\Models\Equipment equipment
 * @property \App\Models\Prefactor prefactor
 * @property \App\Models\User user
 * @property string status
 * @property integer equipment_id
 * @property integer num
 * @property string unit_price
 * @property integer prefactor_id
 * @property integer user_id
 */
class PrefactorDetail extends Model
{
    use SoftDeletes;

    public $table = 'prefactor_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'status',
        'equipment_id',
        'num',
        'unit_price',
        'prefactor_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'equipment_id' => 'integer',
        'num' => 'integer',
        'unit_price' => 'string',
        'prefactor_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status' => 'required',
        'unit_price' => 'required'
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
    public function prefactor()
    {
        return $this->belongsTo(\App\Models\Prefactor::class, 'prefactor_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
