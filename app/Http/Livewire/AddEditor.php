<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Posts;
use App\Models\Collaborators;
use Illuminate\Support\Str;
use App\Events\StatusLiked;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AddEditor extends Component
{
    public function render()
    {
        $posts = DB::table('posts')->where('featured', 1)->orderBy('created_at', 'desc')->limit(5)->get();

        return view('livewire.add-editor', ['posts' => $posts]);
    }

}
