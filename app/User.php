<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //リレーション
    public function followings()
   {
    return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
   }
    //リレーション
    public function followers()
   {
    return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
   }

}
