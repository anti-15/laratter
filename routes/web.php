<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentController;


use App\Models\User;

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
Route::group(['middleware' => 'auth'], function () {
  //コメント
  Route::get('/comment/{tweet}/create', [CommentController::class, 'create'])->name('comment.create');
  Route::post('/comment/{tweet}/comment', [CommentController::class, 'store'])->name('comment.store');
  Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
  Route::get('/comment/{tweet}/list', [CommentController::class, 'list'])->name('comment.list');
  
  //Route::get('/comment/{comment}', [CommentController::class, 'show'])->name('comment.show');
  //検索
  Route::get('/tweet/search/input', [SearchController::class, 'create'])->name('search.input');
  
  Route::get('/tweet/search/result', [SearchController::class, 'index'])->name('search.result');
  //タイムライン
  Route::get('/tweet/timeline', [TweetController::class, 'timeline'])->name('tweet.timeline');

  Route::get('user/{user}', [FollowController::class, 'show'])->name('follow.show');

  Route::post('user/{user}/follow', [FollowController::class, 'store'])->name('follow');
  Route::post('user/{user}/unfollow', [FollowController::class, 'destroy'])->name('unfollow');

  Route::post('tweet/{tweet}/favorites', [FavoriteController::class, 'store'])->name('favorites');
  Route::post('tweet/{tweet}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');
  
  Route::get('/tweet/mypage', [TweetController::class, 'mydata'])->name('tweet.mypage');
  
  Route::resource('tweet', TweetController::class);
  //コメント
  

  Route::get('/dashboard/sum/', 'App\Http\Controllers\TweetController@sum')->name('tweet.sum');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




require __DIR__.'/auth.php';
 