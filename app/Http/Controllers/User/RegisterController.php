<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class RegisterController extends Controller
{
    //注册页面
    public function index()
    {
        return view('user.register');
    }

    //注册
    public function register()
    {
        $this->validate(request(),[
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5|max:20|confirmed',
        ]);
        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));
        $user = User::create(compact('name','email','password'));
        //登陆
        $user_data = request(['email','password']);
        $is_remember = boolval(1);
        if(\Auth::attempt($user_data,$is_remember)){
            return redirect('/posts');
        }
        return redirect('/users/login')->withErrors('发生了不为人知的错误，自动登录失败！');
    }
}
