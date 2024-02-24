<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile(User $user)
    {
    if (Auth::check()) {
        $user = Auth::user(); // ログインユーザーを取得
        $posts = \App\Post::query()->whereIn('user_id', Auth::user()->followings()->pluck('followed_id'))->latest()->get();
        $follows = Auth::user()->followings()->get();
        return view('users.profile')->with([
          'user' => Auth::user(),
          'bio' => Auth::user()->bio,
          'posts' => $posts,
          'follows' => $follows,
        ]);
        } else {
        return redirect()->route('profile');
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
     //検索時、Authユーザーが表示されないようにする
      $users = User::where('id', '!=', Auth::user()->id)->get();
      // 検索ワードもViewに渡す
      return view('users.search', ['users' => $users, 'keyword' => $keyword]);
      $authenticatedUser = Auth::user();
     // 認証されたユーザーが検索結果のユーザーをフォローしているかどうかを確認する
      $users = $users->map(function ($user) use ($authenticatedUser) {
      $user->is_followed = $authenticatedUser->followings->contains('id', $user->id);
      return $user;
      });
      }
      // 3つ目の処理
      return view('users.search',['users'=>$users, 'keyword'=>$keyword]);
      }
     // フォロー機能
    public function follow($id)
      {
      $authenticatedUser = Auth::user();
      $user = User::find($id);
    // フォローしていない場合のみフォローする
      if (!$authenticatedUser->followings->contains($user)) {
          $authenticatedUser->followings()->attach($user);
      }
       return redirect()->back();
      }
    // フォロー解除機能
    public function unfollow($id)
      {
      $authenticatedUser = Auth::user();
      $user = User::find($id);
    // フォローしている場合のみフォロー解除する
     if ($authenticatedUser->followings->contains($user)) {
         $authenticatedUser->followings()->detach($user);
     }
      return redirect()->back();
      }
}
?>
