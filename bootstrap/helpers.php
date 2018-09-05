<?php
/**
 * Created by Calenduck TEAM.
 * User: karin
 * Created at: 2018 - 04 - 08
 * Time: 21 : 58 : 22
 */

function get_db_config()
{
    if (getenv('IS_IN_HEROKU')) {
        $url = parse_url(getenv("DATABASE_URL"));

        //var_dump($url);exit;

        return $db_config = [
            'connection' => 'pgsql',
            'host' => $url["host"],
            'database'  => substr($url["path"], 1),
            'username'  => $url["user"],
            'password'  => $url["pass"],
        ];
    }
    else {
        return $db_config = [
            'connection' => env('DB_CONNECTION', 'mysql'),
            'host' => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', 'forge'),
            'username'  => env('DB_USERNAME', 'forge'),
            'password'  => env('DB_PASSWORD', ''),
        ];
    }
}

function get_url_config()
{
    if (getenv('IS_IN_HEROKU')) {


        //var_dump($url);exit;

        return $url_config = [
            'url'   =>  'https://calenduck.herokuapp.com',
        ];
    }
    else {
        return $url_config = [
            'url' => env('APP_URL'),
        ];
        //return env('APP_URL', 'http://calenduck.test');

    }
}

function route_class()
{
    $routeClass = str_replace('.', '-', Route::currentRouteName());

    return $routeClass ? $routeClass : 'home';
}

function cws($str) {
    //找出字符串中的英文单词和数字
    if(preg_match_all('%[A-Za-z0-9_-]{1,}%', $str, $matches)) {
        $arr = $matches[0];
    }
    //以非中文(中文包括简体和繁体)进行正则分割
    $sections = preg_split('%[^\x{4e00}-\x{9fa5}]{1,}%u', $str);
    foreach($sections as $v) {
        //注意:foreach中多次正则匹配会降低性能
        switch(true) {
            case ($v === ''): continue; break;
            case (mb_strlen($v, 'UTF-8') < 3): $arr[] = $v; break;
            case (preg_match_all('%[\x{4e00}-\x{9fa5}]%u', $v, $matches)):
                //前后俩俩组合,实现冗余分词.
                //如"中国好声音"将被分词为: 中国 国好 好声 声音
                $size = count($matches[0]);
                for($i = 0; $i <= $size-2; $i++) {
                    $word = '';
                    for($j = 0; $j < 2; $j++) {
                        $word .= $matches[0][$i+$j]; echo $i.' '.$j.' '.$matches[0][$i+$j]."\n<br/>";
                    }
                    $arr[] = $word; echo "\n<br/>";
                }
                break;
        }
    }
    return array_unique($arr);
}