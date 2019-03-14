<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function  like(){
          return $this->hasMany('App\Like');
     }
    
    public function  follow(){
          return $this->hasMany('App\Follow','follow_id','user_id');
     } 
}
