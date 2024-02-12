<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            //validateメソッドの追加
            //UserNameはusersテーブルのusernameの条件を指定
            $request->validate([
             'UserName' => 'required|unique:users,username|max:12|min:2',
            //MailAdressはusersテーブルのmailの条件を指定
             'MailAdress' => 'required|email|unique:users,mail|max:40|min:5',
            //Passwordはusersテーブルのpasswordの条件を指定
            //alpha_numで英数字のみで構成（unique ルールは不要になる）
             'Password' => 'required|alpha_num|max:20|min:8',
            //PasswordConfirmはusersテーブルのpassword_confirmationの条件を指定
            //same:PasswordでPassword 入力欄と一致しているかも確認！
             'PasswordConfirm' => 'required|alpha_num|max:20|min:8|same:Password',
              ]);

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
