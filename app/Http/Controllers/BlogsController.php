<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 *
 * 微博文章管理
 *
 * Class BlogsController
 * @package App\Http\Controllers
 */
class BlogsController extends Controller
{
    /**
     * BlogsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * 写入微博
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 验证请求
        $this->validate($request,[
            'content'   =>  'required|max:140',
        ]);

        Auth::user()->blogs()->create([
            'content'  =>  $request['content']
        ]);

        return redirect()->back();
    }

    /**
     *
     * 删除微博
     *
     * @param Blog $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Blog $blog)
    {
        $isFailed = false;
        try {
            $this->authorize('destroy', $blog);
        } catch (AuthorizationException $e) {
            // 未授权处理
            $isFailed = true;
            session()->flash('danger', trans('pages.blog.destroy.message.access_denied'));
        }

        try {
            $blog->delete();
        } catch (\Exception $e) {
            $isFailed = true;
            session()->flash('danger', trans('pages.blog.destroy.message.failed'));
        }

        if($isFailed)
            return redirect()->intended(route('users.show',[Auth::user()]));

        session()->flash('success', trans('pages.blog.destroy.message.success'));
        return back();
    }
}
