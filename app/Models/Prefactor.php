<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Prefactor
 * @package App\Models
 * @version March 10, 2020, 6:21 pm +0330
 *
 * @property \App\Models\User user
 * @property \App\Models\Order order
 * @property \App\Models\Factory factory
 * @property integer user_id
 * @property integer order_id
 * @property integer factory_id
 */
class Prefactor extends Model
{
    use SoftDeletes;

    public $table = 'prefactors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'order_id',
        'factory_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'order_id' => 'integer',
        'factory_id' => 'integer'
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
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'id');
    }

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
    public function prefactor_details()
    {
        return $this->hasMany('\App\Models\PrefactorDetail');
    }
}
