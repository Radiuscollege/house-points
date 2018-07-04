<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function home() {
        $user = \App\User::with(['profile.house', 'profile.latestBadges', 'profile.badges'])->where('id', \Auth::id())->first();
        return view('pages/index', compact('user'));
    }

    public function admin() {
        $user = \App\User::with(['profile.house'])->where('id', \Auth::id())->first();
        $users = \App\User::all();
        $badges = \App\Badge::all();
        return view('pages/admin', compact(['user', 'badges', 'users']));
    }

}
