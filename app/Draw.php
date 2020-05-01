<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Draw extends Model
{
    public function comments() {
        return $this->hasMany('App\Comment');
    }
    public function favorites() {
        return $this->hasMany('App\Favorite');
    }
    public function votes() {
        return $this->hasMany('App\Vote');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
}
