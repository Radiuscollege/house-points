<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function home() {
        $user = \App\User::with(['profile.house', 'profile.latestBadges', 'profile.badges', 'profile.logs'])->where('id', \Auth::id())->first();

        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);
        $pointsThisWeek = \App\Log::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                ->where('profile_id', \Auth::id())
                                ->sum('points');
        $user['pointsThisWeek'] = number_format( $pointsThisWeek );
        return view('pages/index', compact('user'));
    }

    public function admin() {
        $user = \App\User::with(['profile.house'])->where('id', \Auth::id())->first();
        $users = \App\User::all();
        $badges = \App\Badge::all();
        return view('pages/admin', compact(['user', 'badges', 'users']));
    }

}
