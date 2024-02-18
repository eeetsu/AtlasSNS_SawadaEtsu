<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
