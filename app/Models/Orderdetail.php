<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Orderdetail
 * @package App\Models
 * @version February 17, 2020, 9:10 pm +0330
 *
 * @property \App\Models\Equipment equipment
 * @property \App\Models\Order order
 * @property \App\Models\User user
 * @property string status
 * @property integer equipment_id
 * @property integer num
 * @property string unit_price
 * @property integer order_id
 * @property integer user_id
 */
class Orderdetail extends Model
{
    use SoftDeletes;

    public $table = 'orderdetails';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'status',
        'equipment_id',
        'num',
        'unit_price',
        'order_id',
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
        'order_id' => 'integer',
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
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
