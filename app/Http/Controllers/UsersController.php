<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

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
    public function search(Request $request)    //検索機能
    {
     // 1つ目の処理
      $keyword = $request->input('keyword');
     // 2つ目の処理
      if(!empty($keyword)){
      $users = User::where('username','like', '%'.$keyword.'%')->where('id', '!=', Auth::user()->id)->get();
      }else{
            $users = User::where('id', '!=', Auth::user()->id)->get();
            //検索時、Authユーザーが表示されないようにする
      }
      // 3つ目の処理
      return view('users.search',['users'=>$users, 'keyword'=>$keyword]);
    }

}
