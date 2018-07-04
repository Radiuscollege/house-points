<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router->middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$router->get('houses', 'HousesController@index');
$router->get('users/{id}', 'ProfilesController@show');
$router->get('reasons', function() {
    return \App\Reason::all();
});

$router->get('badges', 'BadgesController@index');
