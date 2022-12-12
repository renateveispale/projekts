<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;
use App\Http\Livewire\Click;
use App\Http\Livewire\CreateFile;
use App\Http\Livewire\ShowPosts;
use App\Http\Livewire\ShowFile;

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
	return view('welcome3');
})->middleware(['auth', 'verified']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::resource('test', TestController::class)
//     ->only(['index'])
//     ->middleware(['auth', 'verified']);

Route::get('/test2', [TestController::class, 'index']);

//requires login for every route accessed
Route::group(['middleware' => 'auth', 'verified'], function () {
    Route::get('check-click-event', Click::class);
    Route::get('/files', ShowFile::class);
    // Route::get('/files/add', CreateFile::class);
    // Route::get('/post', ShowPosts::class);
    // Route::get('/post/{id}', ShowPosts::class);

});

require __DIR__.'/auth.php';
