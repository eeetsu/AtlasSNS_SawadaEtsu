<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Follow;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;


class PostsController extends Controller
{
    public function index()
    {
      if (Auth::check()) {
        $user = Auth::user(); // ログインユーザーを取得
        $posts = \App\Post::query()->whereIn('user_id', Auth::user()->followings()->pluck('followed_id'))->latest()->get();
        $follows = Auth::user()->followings()->get();
        // ログインユーザーの画像情報を取得
        $images = User::whereIn('id', Auth::user()->followings()->pluck('followed_id'))->get()->pluck('images');

        return view('posts.index')->with([
            'user' => Auth::user(),
            'posts' => $posts,
            'follows' => $follows,
            'images' => $images,
        ]);
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

    if ($request->hasFile('images')) {
        $image = $request->file('images');
        $name = time() . '_' . $image->getClientOriginalName();

        // 画像をリサイズして保存
        $resizedImage = Image::make($image)
            ->fit(64)
            ->encode('png', 80); // PNGフォーマットで保存
        // 2KB未満になるように圧縮
        $resizedImage->encode('png', 80);
        // ファイルサイズが2KB未満になるようにする
        while ($resizedImage->filesize() > 2048) {
            $resizedImage->encode('png', 80);
        }

        Storage::put('public/images/' . $name, $resizedImage);

        $post->images = $name;
    }

    $post->save();
    return redirect('/top');
    }
    public function edit($post_id)
    {
         $post = Post::find($post_id);
         $posts = Post::where('user_id', Auth::id())->get();
         //モーダル表示用に初期値を設定
        return view('posts.edit', ['post' => $post, 'posts' => $posts, 'follows' => Auth::user()->followings()->get()]);
    }
    //投稿の削除
    public function destroy($post_id)
    {
    $post = Post::find($post_id);
    $post->delete();
    return redirect('/top');
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
        $images = $user->images;
        return view('follows.followList')->with([
          'user' => Auth::user(),
          'posts' => $posts,
          'follows' => $follows,
          'images' => $images,
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
        $images = $user->images;
        return view('follows.followerList')->with([
            'user' => Auth::user(),
            'posts' => $posts,
            'follows' => $follows,
            'images' => $images,
        ]);
    } else {
        return redirect()->route('follower-list');
    }
    }

}
