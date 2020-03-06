<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Card
 * @package App\Models
 * @version February 19, 2020, 9:11 pm +0330
 *
 * @property \App\Models\Equipment equipment
 * @property integer equipment_id
 * @property integer num
 */
class Card extends Model
{
    use SoftDeletes;

    public $table = 'cards';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'equipment_id',
        'user_id',
        'num'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'equipment_id' => 'integer',
        'user_id' => 'integer',
        'num' => 'integer'
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
    public function equipment()
    {
        return $this->belongsTo(\App\Models\Equipment::class, 'equipment_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
