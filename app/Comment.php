<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function draw() {
        return $this->belongsTo('App\Draw');
    }
    public function user() {
        return $this->belongTo('App\User');
    }
}
