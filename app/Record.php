<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['confirm','donor','user_id','request_id'];


    public function claim(){

        return $this->belongsTo('App\Claim','request_id');
    }
    public function user(){

        return $this->belongsTo('App\User', 'user_id');
    }
}
