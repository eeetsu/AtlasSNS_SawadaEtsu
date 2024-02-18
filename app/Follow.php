<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Follow extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'following_id', 'followed_id',
    ];

    //リレーション
    public function follower()
    {
        return $this->belongsTo(User::class, 'following_id');
    }

    //リレーション
    public function followed()
    {
        return $this->belongsTo(User::class, 'followed_id');
    }
}
