<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Follow;


class PostsController extends Controller
{
    public function index()
    {
     if (Auth::check()) {
        // ログインユーザーの投稿とフォローしているユーザーの投稿を取得
        $posts = Post::whereIn('user_id', [Auth::user()->id])->latest()->get();
          //Follow::get(); はモデルから呼び出している！
          //Followモデル（followsテーブル）からレコード情報を取得
        $follows = Follow::get();

        return view('posts.index', compact('posts', 'follows'));
    } else {
        return redirect()->route('top');
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'post' => 'required|min:1|max:150',
        ]);
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->post = $request->post;
        $post->save();
        return redirect('/top');
    }
    public function edit(Request $request)
    {
        $post = Post::find($request->post_id);
        return view('posts.index', ['post' => $post]);
    }
    public function update(Request $request, $post_id)
    {
        $request->validate([
            'post' => 'required|min:1|max:150',
        ]);
        $post = Post::find($post_id);
        $post->post = $request->post;
        $post->save();
        return redirect('/top');
    }
    public function followList(User $users)
    {
    if (Auth::check()) {
        $user = Auth::user(); // ログインユーザーを取得
        $posts = \App\Post::query()->whereIn('user_id', Auth::user()->followings()->pluck('followed_id'))->latest()->get();
        $follows = Auth::user()->followings()->get();
        return view('follows.followList')->with([
          'user' => Auth::user(),
          'posts' => $posts,
          'follows' => $follows,
        ]);
    } else {
        return redirect()->route('follow-list');
    }
    }
    public function followerList(User $users)
    {
    if (Auth::check()) {
        $user = Auth::user(); // ログインユーザーを取得
        $posts = \App\Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('following_id'))->latest()->get();
        $follows = Auth::user()->followers()->get();
        return view('follows.followerList')->with([
            'user' => Auth::user(),
            'posts' => $posts,
            'follows' => $follows,
        ]);
    } else {
        return redirect()->route('follower-list');
    }
}
}
