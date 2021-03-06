<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id','draw_id','text','like','dislike'];

    public function draw() {
        return $this->belongsTo('App\Draw');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
}
