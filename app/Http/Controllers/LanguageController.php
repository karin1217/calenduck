<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function change(Request $request, $lang='ja')
    {
        $lang = $request->route('lang');


        if(in_array($lang, ['en','ja','kr','zh-CN'])) {
            //设置全局Session
            //session(['language' => $lang]);
            $request->session()->put('language',$lang);

            App::setLocale($lang);

            $app = app();

            $app->setLocale($lang);



            //dd(App::getLocale());
//            $prevUrl = session()->get('_previous')['url'];
//            if ($prevUrl && !strpos($prevUrl, '/language/')) {
//                return redirect($prevUrl);
//            }
        }
    }
}
