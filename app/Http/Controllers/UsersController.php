<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class UsersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('language');
    }

    public function create(Request $request)
    {
        return view('users.create')->with('lang', $request->session()->get('language'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>              'required|min:3|max:25',
            'email'     =>              'required|email|unique:users|max:255',
            'password'  =>              'required|confirmed|min:6',
            'password_confirmation' =>  'required',
        ]);

//        var_dump($request);

        $user = User::create([
            'name'      =>      $request->name,
            'email'     =>      $request->email,
            'password'  =>      bcrypt($request->password)

        ]);

        $message = trans('messages.welcome',[],$request->session()->get('language'));

        //var_dump($message);
        session()->flash('success', $message);

        return redirect()->route('users.show',[$user]);
    }

    public function show(Request $request, User $user)
    {

        $request->session()->put('kkkk','aaaa');

        //App::setLocale('zh-CN');
        return view('users.show', compact('user'));
    }


}
