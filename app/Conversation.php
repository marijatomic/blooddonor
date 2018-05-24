<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['title','last_message_time','userRequest_id','donor_id'];

}
