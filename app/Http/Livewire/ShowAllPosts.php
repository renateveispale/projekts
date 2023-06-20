<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShowAllPosts extends Component
{

    public function render()
    {
        
        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        // ->join('collaborators', 'posts.id', '=', 'collaborators.posts_id')
        ->where('posts.user_id', Auth::user()->id)->orderBy('posts.created_at', 'desc')
        ->get();
        return view('livewire.show-all-posts', ['posts' => $posts]);
    }
}
