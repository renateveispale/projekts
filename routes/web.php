<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;
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

Route::get('/pusher', function () {
    return view('index2');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
	event(new App\Events\StatusLiked(Auth::user()->name));
	return view('welcome3');
})->middleware(['auth', 'verified']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::resource('test', TestController::class)
//     ->only(['index'])
//     ->middleware(['auth', 'verified']);

Route::get('/test2', [TestController::class, 'index']);


Route::group(['middleware' => 'auth'], function () {
    // Route::get('/home', [PostsController::class, 'index'])->name('post');
    // Route::post('/posts/create', [PostsController::class, 'store']);
    // Route::put('/posts/{todo}', [PostsController::class, 'update']);
    // Route::delete('/posts/{todo}', [PostsController::class, 'destroy']);
});

require __DIR__.'/auth.php';
