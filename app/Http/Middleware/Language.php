<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
//use Illuminate\Session\Middleware\StartSession;

class Language
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
//        dd($lang);
//        $lang = $request->lang;//两者均可
        if(in_array($lang, ['en','ja','ko','zh-CN'])) {
            //设置全局Session
            session(['language' => $lang]);

            App::setLocale($lang);

            //dd(App::getLocale());
            $prevUrl = session()->get('_previous')['url'];
            if ($prevUrl && !strpos($prevUrl, '/language/')) {
                return redirect($prevUrl);
            }
        }

        return redirect('/');
        //return $next($request);
    }
}
