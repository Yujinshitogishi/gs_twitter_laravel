<?php
use App\Text;
use Illuminate\Http\Request;
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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/tweets', 'TweetController@timeline');
Route::get('/tweets', 'TweetController@index');
Route::get('/tweets','TweetController@ownfollowcheck');
Route::post('/timelines','TweetController@tweetpost');
Route::get('/timelines', 'TweetController@timeline');
Route::post('/tweet_like','TweetController@like');

Route::get('/user/{user}','UserController@userpage');
Route::post('/user/follow','UserController@follow');
Route::post('/user/unfollow','UserController@unfollow');
Route::get('/choices','UserController@choices');
Route::get('/user_list','UserController@user_list');
Route::post('/user_like','UserController@like');
Route::post('/user_unlike','UserController@unlike');
// Route::get('/user/{user}','UserController@likecheck');
Auth::routes();

Route::get('/home', 'TweetController@timeline')->name('/home');
// Route::get('/home', 'UserController@userpage')->name('/home');
// Route::post('/auth/login','Auth\LoginController@showLoginFrom');
// Route::get('/auth/login','Auth\LoginController@login');
Route::get('/auth/logout','Auth\LoginController@logout');
