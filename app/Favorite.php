<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function user() {
        return $this->belongTo('App\User');
    }
    public function draw() {
        return $this->belongTo('App\Draw');
    }
}
