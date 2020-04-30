<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function user() {
        return $this->belongTo('App\User');
    }
    public function draws() {
        return $this->belongsToMany('App\Draw');
    }
}
