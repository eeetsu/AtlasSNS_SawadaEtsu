<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;


class PostsController extends Controller
{
    public function index()
    {
    if (Auth::check()) {
        return view('posts.index');
        } else {
        return redirect()->route('login');
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
    public function followList(User $users)
    {
    $follows = User::where('id', '!=', Auth::user()->id)->get();

    return view('/follows/followList', compact('follows'));
    }
    public function followerList(User $users)
    {
    $followers = User::where('id', '!=', Auth::user()->id)->get();

    return view('/follows/followerList', compact('followers'));
    }
}
