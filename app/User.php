<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments() {
        return $this->hasMany('App\Comment');
    }
    public function favorites() {
        return $this->hasMany('App\Favorite');
    }
    public function follows() {
        return $this->hasMany('App\Follow');
    }
    public function votes() {
        return $this->hasMany('App\Vote');
    }
    public function draws() {
        return $this->hasMany('App\Draw');
    }
    //public function messages()
    //{
    //return $this->hasMany(Message::class);
    //}
    public function messages(){

        return $this->hasMany(Chat::class);
        
    }
}
