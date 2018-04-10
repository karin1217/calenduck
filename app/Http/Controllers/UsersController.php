<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // 验证请求
        $this->validate($request, [
            'name'      =>              'required|min:3|max:25',
            'email'     =>              'required|email|unique:users|max:255',
            'password'  =>              'required|min:6|confirmed',
            'password_confirmation' =>  'required',
        ]);

        // 存储用户数据
        $user = User::create([
            'name'      =>      $request->name,
            'email'     =>      $request->email,
            'password'  =>      bcrypt($request->password)

        ]);

        // 注册成功自动登录
        Auth::login($user);
        // 注册成功后翻译欢迎消息
        $message = trans('messages.welcome');
        // 将欢迎消息闪存到Session
        session()->flash('success', $message);

        return redirect()->route('users.show',[$user]);
    }

    public function show(Request $request, User $user)
    {

        $request->session()->put('kkkk','aaaa');

        //App::setLocale('zh-CN');
        return view('users.show', compact('user'));
    }


}
