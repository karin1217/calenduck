<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        // 验证用户请求的邮箱、密码
        $credentials = $this->validate($request, [
            'email'     =>  'required|email|max:255',
            'password'  =>  'required',
        ]);

        // 认证邮箱和密码是否匹配
        if(Auth::attempt($credentials, $request->has('remember')))
        {
            session()->flash('success', trans('messages.login.success',[],$request->session()->get('language')));
            return redirect()->route('users.show',[Auth::user()]);
        }else{
            session()->flash('danger', trans('messages.login.failed',[],$request->session()->get('language')));
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        session()->flash('success','您已成功退出');
        return redirect('login');
    }
}
