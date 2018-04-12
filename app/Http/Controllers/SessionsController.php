<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Session管理（登录/注销）
 *
 * Class SessionsController
 * @package App\Http\Controllers
 */
class SessionsController extends Controller
{
    /**
     * SessionsController constructor.
     */
    public function __construct()
    {
        // 只允许未登录的用户访问登录页面
        $this->middleware('guest',[
            'only'  =>  ['create'],
        ]);
    }

    /**
     * 显示登录页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * 登录
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 验证用户请求的邮箱、密码
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        // 认证邮箱和密码是否匹配
        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', trans('messages.login.success'));
            return redirect()->intended(route('users.show', [Auth::user()]));
        } else {
            session()->flash('danger', trans('messages.login.failed'));
            return redirect()->back();
        }
    }

    /**
     * 注销
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        session()->flash('success', '您已成功退出');
        return redirect('login');
    }

}