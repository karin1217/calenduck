<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    /**
     *
     * 主页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function root()
    {
        // 关注好友的最新动态
        $feed_items = [];

        // 只有当用户登录时才能获取
        if(Auth::user())
        {
            $feed_items = Auth::user()->feed()->paginate(9);
        }
        return view('pages.root', compact('feed_items'));
    }
}
