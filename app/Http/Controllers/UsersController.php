<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        // 过滤不需要认证的方法
        $this->middleware('auth',[
            'except' => ['show', 'create', 'store', 'index', 'confirmEmail'],
        ]);

        // 只允许未登录的用户访问注册页面
        $this->middleware('guest',[
            'only'  =>  ['create'],
        ]);
    }

    /**
     * 用户列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     *
     * 用户注册页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     *
     * 注册操作
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
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

        /**
         * 注册后自动登录机制
         */
        /**
        // 注册成功自动登录
        Auth::login($user);
        // 注册成功后翻译欢迎消息
        $message = trans('messages.welcome');
        // 将欢迎消息闪存到 Session
        session()->flash('success', $message);
         **/

        /**
         * 注册后发送验证邮件机制
         */
        $this->sendEmailConfirmationTo($user);

        session()->flash('pages.user.email_confirmation.success');
        return redirect('/');

        //return redirect()->route('users.show',[$user]);
    }

    public function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $from = '1946294910@qq.com';
        $name = '1946294910@qq.com';
        $to   = $user->email;
        $subject = trans('pages.user.email_confirmation.message');

        Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject){
            $message->from($from, $name)->to($to)->subject($subject);
//            $message->to($to)->subject($subject);
        });
    }

    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        // 注册成功后翻译欢迎消息
        $message = trans('messages.welcome');
        // 将欢迎消息闪存到 Session
        session()->flash('success', $message);
        return redirect()->route('users.show',[$user]);
    }

    /**
     *
     * 用户编缉页面
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    /**
     *
     * 更新用户数据
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        // 验证请求
        $this->validate($request, [
            'name'      =>  'required|min:3|max:50',
            'password'  =>  'nullable|min:6|confirmed'
        ]);

        // 更新数据
        $data = [];
        $data['name'] = $request->name;
        if( $request->password ) // 判断是否更新密码
        {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        // 更新成功的提示消息闪存至 Session
        session()->flash('success', trans('pages.user.edit.message.success'));
        // 跳转回用户简介页面
        return redirect()->route('users.show', $user->id);
    }

    /**
     *
     * 显示用户信息
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function show(Request $request, User $user)
    {
        $blogs = $user->blogs()
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);

        return view('users.show', compact('user','blogs'));
    }

    /**
     *
     * 删除用户（特定管理员操作）
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $isFailed = false;
        try {
            $this->authorize('destroy', $user);
        } catch (AuthorizationException $e) {
            // 未授权处理
            session()->flash('danger', trans('pages.user.destroy.message.access_denied'));
            $isFailed = true;
//            return redirect()->intended(route('users.show',[Auth::user()]));
        }

        try {
            $user->delete();
        } catch (\Exception $e) {
            // 删除用户失败
            session()->flash('danger', trans('pages.user.destroy.message.failed'));
            $isFailed = true;
            //return redirect()->intended(route('users.show',[Auth::user()]));
        }

        if($isFailed)
            return redirect()->intended(route('users.show',[Auth::user()]));

        session()->flash('success', trans('pages.user.destroy.message.success'));
        return back();
    }

    public function followings(User $user)
    {
        $users = $user->followings()->paginate(30);

        return view('users.index', compact('users'));
    }

    public function fans(User $user)
    {
        $users = $user->fans()->paginate(30);

        return view('users.index', compact('users'));
    }
}
