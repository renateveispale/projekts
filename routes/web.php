<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;
use App\Http\Livewire\Click;
use App\Http\Livewire\FileComponent;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//requires login for every route accessed
Route::group(['middleware' => 'auth', 'verified'], function () {
    // Route::get('check-click-event', Click::class);
    Route::get('/files', FileComponent::class);
    Route::view('/home', 'home');
    Route::get('post/create', \App\Http\Livewire\PostCreate::class);
    Route::get('post/{slug}', \App\Http\Livewire\ShowPost::class);
    Route::get('post/{slug}/editor', \App\Http\Livewire\AddEditor::class);

});

require __DIR__.'/auth.php';
