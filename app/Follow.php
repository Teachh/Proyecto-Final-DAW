<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['userd_id','userd_id_request'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
