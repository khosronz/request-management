<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $casts = ['id' => 'string'];
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
