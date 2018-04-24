<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        try{
            $this->authorize('follow', $user);
        } catch (AuthorizationException $e) {

        }

        if( ! Auth::user()->isFollowing($user->id) ) {
            Auth::user()->follow($user->id);
        }

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        try{
            $this->authorize('unfollow', $user);
        }catch (AuthorizationException $e){

        }

        if(Auth::user()->isFollowing($user->id)){
            Auth::user()->unfollow($user->id);
        }

        return redirect()->route('users.index');
    }
}
