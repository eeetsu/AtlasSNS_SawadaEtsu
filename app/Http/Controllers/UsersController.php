<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function profile(User $user)
    {
    if (Auth::check()) {
        $user = Auth::user(); // ログインユーザーを取得
        $posts = \App\Post::query()->whereIn('user_id', Auth::user()->followings()->pluck('followed_id'))->latest()->get();
        $follows = Auth::user()->followings()->get();
        $images = $user->images;
        return view('users.profile')->with([
          'user' => Auth::user(),
          'bio' => Auth::user()->bio,
          'posts' => $posts,
          'follows' => $follows,
          'images' => $images,
        ]);
        } else {
        return redirect()->route('profile');
        }
    }
    //プロフィール編集機能
    public function updateProfile(Request $request)
    {
      $request->validate([
      // バリデーションルールを設定
      'username' => 'required|max:12|min:2',
        'mail' => 'required|email|max:40|min:5',
      //Passwordはusersテーブルのpasswordの条件を指定
      //alpha_numで英数字のみで構成（unique ルールは不要になる）
        'password' => 'required|alpha_num|max:20|min:8',
      //PasswordConfirmはusersテーブルのpassword_confirmationの条件を指定
      //same:PasswordでPassword 入力欄と一致しているかも確認！
        'password_confirmation' => 'required|alpha_num|max:20|min:8|same:password',
        'bio' => 'max:150', //必須ではないのでrequiredは省く
      //画像(jpg、png、bmp、gif、svg)ファイル以外は不可
        'images' => 'image|mimes:jpeg,png,bmp,gif|max:2048',
      ]);
      $id=$request->input('id');
      $username=$request->input('username');
      $mail=$request->input('mail');
      $password=$request->input('password');
      $bio=$request->input('bio');

      $users = User::find($id);

      //$images=$request->input('images');

      //AuthenticateSession「パスワード変更時に他のデバイスでログインしているアカウントを強制的にログアウト
      //現在のデバイスでの認証を切らさないためにはAuth::logoutOtherDevices()を使って新しくハッシュ化させたパスワードをセッションに渡す
      //Auth::logoutOtherDevices(Hash::make($request->password));

      // バリデーションを通過した後の処理
      // Userモデルを使用して、該当ユーザーの情報を更新
      User::where('id', $id)->update([
        'username' => $username,
        'mail' => $mail,
        'password' => bcrypt($password), // パスワードはbcryptで暗号化して保存
        'bio' => $bio
      ]);
      //各ユーザーのアイコンを表示させる
       if ($request->hasFile('images')) {
          $name = $request->file('images')->getClientOriginalName();
          $file = $request->file('images')->move('storage/images', $name);
          $users->images = $name;
      }
          $users->save();
       return redirect('/top'); //トップページへリダイレクト
    }

    //プロフィール編集画面を表示する
    public function showUpdateForm()
    {
      return view('users.updateProfile');
    }

    public function followProfile($user_id)
    {
        $user = User::find($user_id);
        $posts = $user->posts;
        $images = $user->images;
        return view('users.profile')->with([
        'user' => $user,
        'bio' => $user->bio,
        'posts' => $posts,
        'images' => $images,
        ]);
    }

    public function followerProfile($user_id)
    {
        $user = User::find($user_id);
        $posts = $user->posts;
        $images = $user->images;
        return view('users.profile')->with([
        'user' => $user,
        'bio' => $user->bio,
        'posts' => $posts,
        'images' => $images,
        ]);
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
