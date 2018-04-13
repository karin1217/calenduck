<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home()
    {
        $users = User::first(); //User::all(10);
        var_dump($users);exit;

        //return view('users.index', compact('users'));

        //return "$user->name";
//        $isShowRecent = true;
//        $isShowSlider = true;
//        return view('static_pages/home', compact('isShowRecent', 'isShowSlider'));
    }

    public function help()
    {
        return view('static_pages/help');
    }

    public function about()
    {
        return view('static_pages/about');
    }

    public function test()
    {
        return view('static_pages/test');
    }

    public function main()
    {
        $isShowSlider = true;
        $hasMiddle = true;
//        $isShowRecent = true;
        return view('static_pages/main', compact('hasMiddle','isShowSlider'));
    }

    public function slider()
    {

//        [一月] => stdClass Object
//    (
//        [name] => Admin ADMIN
//    [manager] => 1
//                [id] => 99999
//                [days] => Array
//    (
//        [1] => stdClass Object
//    (
//        [id] => 0
//                [type] =>
//                [acronym] =>
//                [status] =>
//                [display] => 0
//                )

        $year = date('year');
        $months = array(
            'January' => 31,
            'February' => 28,
            'March' => 31,
            'April' => 30,
            'May' => 31,
            'June' => 30,
            'July' => 31,
            'August' => 31,
            'September' => 30,
            'October' => 31,
            'November' => 30,
            'December' => 31
        );



        foreach( $months as $key=> $value)
        {
            $sub = [
                'id'=> 0,
                'type'=>'',
                'acronym'=>'',
                'status'=>'',
                'display'=>random_int(0,9)
            ];
            for($i=1; $i<=$value; $i++)
            {
                $days[$i] = $sub;
            }



            $tmp = json_decode(json_encode([
                'name' => 'Admin ADMIN',
                'manager' => random_int(0,1),
                'id' => 99999,
                'days' => $days,
            ]));

            $months[$key] = $tmp;
        }

        return view('slider', compact('months','year'));
    }

    public function calendar()
    {
        //$isShowSlider = true;
        return view('calendar/calendar');
    }
}
