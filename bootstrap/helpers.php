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
            'url' => env('APP_URL', 'http://localhost'),
        ];
//        return $db_config = [
//            'connection' => env('DB_CONNECTION', 'mysql'),
//            'host' => env('DB_HOST', 'localhost'),
//            'database'  => env('DB_DATABASE', 'forge'),
//            'username'  => env('DB_USERNAME', 'forge'),
//            'password'  => env('DB_PASSWORD', ''),
//        ];
    }
}