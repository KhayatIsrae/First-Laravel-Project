<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikesController;
use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\UserController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/',[ DashBoardController::class ,'index' ])->name('dashboard');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'store'])->name('register');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/authentificate',[AuthController::class,'authentificate'])->name('authentificate');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::resource('ideas',IdeaController::class)->except(['index','create','show'])->middleware('auth');
Route::resource('ideas',IdeaController::class)->only(['show']);
Route::resource('ideas.comments',CommentController::class)->only(['store'])->middleware('auth');
Route::delete('/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');
Route::resource('users', UserController::class)->only(['show','edit','update'])->middleware('auth');
route::post('users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name('users.follow');
route::post('users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');
route::put('ideas/{idea}/like',[IdeaLikesController::class,'like'])->middleware('auth')->name('ideas.like');
route::put('ideas/{idea}/unlike',[IdeaLikesController::class,'unlike'])->middleware('auth')->name('ideas.unlike');
route::post('story/',[StoryController::class,'store'])->middleware('auth')->name('stories.store');
route::get('story/{user}',[StoryController::class,'show'])->middleware('auth')->name('stories.show');



































//Route::get('/terms',[TermsController::class,'index']);
/*Route::group(['prefix'=>'idea/','as'=>'ideas.','middleware'=>['auth']],function(){
    Route::post('',[IdeaController::class,'store'])->name('store');
    Route::delete('/{idea}',[IdeaController::class,'destroy'])->name('destroy');
    Route::get('/{idea}',[IdeaController::class,'show'])->name('show')->withoutMiddleware('auth');
    Route::get('/{idea}/edit',[IdeaController::class,'edit'])->name('edit');
    Route::put('/{idea}/edit',[IdeaController::class,'update'])->name('update');
    Route::post('/{idea}/comment',[CommentController::class,'store'])->name('comment.store');
});*/
