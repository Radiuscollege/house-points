<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = \App\User::with('profile.house')->first();
        return view('pages/index', compact('user'));
    }

}
