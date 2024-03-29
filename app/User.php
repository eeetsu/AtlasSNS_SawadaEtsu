<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    protected $fillable = [
    'username', 'mail', 'password', 'bio',
    'images' // 画像のカラムを追加
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
    return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }

    //リレーション
    public function followers()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }

}
