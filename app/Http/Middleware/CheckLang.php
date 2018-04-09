<?php

namespace App\Http\Middleware;

use Closure;

class CheckLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //中间件获取路由参数
        $lang = $request->route('lang');
        if( ! $lang ) {
            $lang = session('language');
        }
//        dd($lang);
//        $lang = $request->lang;//两者均可
        if( ! in_array($lang, ['en','ja','zh-CN']) ) {
            //设置默认语言为日语
            $lang = 'ja';
            //设置全局Session
            session(['language' => $lang]);
            //改变语言环境
            \App::setLocale($lang);
            //dd(App::getLocale());
        }
        return $next($request);
    }
}
