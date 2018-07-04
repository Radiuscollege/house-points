<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ProfilesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
      if ($request->has(['start', 'amount'])) {
        return \App\Profile::with(['house', 'badges'])
          ->skip($request->input('start'))
          ->take($request->input('amount'))
          ->get();
      }

      return \App\Profile::with(['house', 'badges'])->get();
    }

    public function show($id) {
      return \App\Profile::with(['house', 'user', 'badges'])->where('studentnr', $id)->get();
    }

    public function showBadges($id) {
      $profile = \App\Profile::with('badges')->where('studentnr', $id)->first();
      return $profile->badges;
    }

    public function update(Request $request, $id) {
    }

    public function addPoints(Request $request) {
      $profile = \App\Profile::where('studentnr', $request->id)->first();
      $profile->points += $request->points;
      $profile->update();

      $logBody = \App\Reason::findOrFail($request->log)->name;

      $log = new \App\Log();
      $log->points = $request->points;
      $log->profile_id = $request->id;
      $log->profile_name = $request->name;
      $log->giver_id = \Auth::user()->id;
      $log->giver_name = \Auth::user()->name;
      $log->body = $logBody;
      $log->save();
    }



}
