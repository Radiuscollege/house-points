<?php
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$router->get('/amoclient/ready', function() {

    $user = \Auth::user();

    \App\Profile::addNew($user);

    if (!\Auth::check()) {
        return redirect('/login');
    }

    return \Auth::user()->isAdmin() ?
        redirect()->route('admin') :
        redirect()->route('home');

});

$route::get('/login', function(){
	return redirect('/amoclient/redirect');
})->name('login');



$router->get('/', function() {
    if ( \Auth::check() ) {
        return \Auth::user()->isAdmin() ?
        redirect()->route('admin') :
        redirect()->route('home');
    } else {
        return redirect()->route('login');
    }

});

$router->get('/home', 'HomeController@home')->name('home')->middleware('auth');

$router->group(['middleware' => ['admin']], function() use ($router) {
    $router->get('/admin', 'HomeController@admin')->name('admin');
    $router->post('/admin', 'ProfilesController@addPoints')->name('addPoints');
});
