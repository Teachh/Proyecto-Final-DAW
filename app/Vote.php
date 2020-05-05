<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected $fillable = ['userd_id','draw_id','vote'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function draw() {
        return $this->belongsTo('App\Draw');
    }
}
