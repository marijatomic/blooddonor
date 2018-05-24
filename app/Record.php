<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['confirm','donor','user_id','request_id'];

    public function records()
    {
        return $this->hasMany('App\Conversations','user_id');
    }
}
