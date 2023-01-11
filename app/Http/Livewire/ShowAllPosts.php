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
        $posts = DB::table('posts')->where('user_id', Auth::user()->id)->get();
        return view('livewire.show-all-posts', ['posts' => $posts]);
    }
}
