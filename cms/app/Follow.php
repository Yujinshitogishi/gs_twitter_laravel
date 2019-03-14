<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function tweet(){
        return $this->belongsTo('App\Tweet','follow_id','user_id');
    }
}
