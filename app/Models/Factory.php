<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Factory
 * @package App\Models
 * @version February 17, 2020, 5:20 pm +0330
 *
 * @property string title
 * @property string desc
 */
class Factory extends Model
{
    use SoftDeletes;

    public $table = 'factories';
    

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

    public function factorytells()
    {
        return $this->hasMany('App\Models\Factorytell');
    }

    public function factoryaddresses()
    {
        return $this->hasMany('App\Models\Factoryaddress');
    }

    
}
