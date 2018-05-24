<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = ['patient_name','patient_birth','patient_address','patient_phone','patient_blood','patient_sex',
        'description','user_id'];

    public function records(){
        return $this->hasMany('App\Record');
    }


    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
