<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
}
