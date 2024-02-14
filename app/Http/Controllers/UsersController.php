<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function profile()
    {
    if (Auth::check()) {
        return view('users.profile');
    } else {
        return redirect()->route('login');
    }
}
public function search()
{
    if (Auth::check()) {
        return view('users.search');
    } else {
        return redirect()->route('login');
    }
}
}
