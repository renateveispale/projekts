<?php

namespace App\Http\Livewire;

use App\Models\Posts;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Events\StatusLiked;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EditPost extends Component
{
    public $saveSuccess = false;
    public $post;

    protected $rules = [
        'post.title' => 'required|min:1',
        'post.body' => 'required|min:1',
    ];

    public function editPost(){
        
        $title = $this->post->title;
        $body = $this->post->body;
        $slug = Str::slug($this->post->title);
        $timestamp = Carbon::now()->toDateTimeString();

        // dd($check_file_count);

        DB::table('posts')
            ->where('user_id', Auth::user()->id)
            ->update(['body' => $body, 'title' => $title, 'updated_at' => $timestamp]);

        $this->emit(event(new StatusLiked(Auth::user()->name, $this->post->body, $this->post->title)));
        $this->saveSuccess = true;

    }
    

    public function render()
    {
        return view('livewire.show-post');
    }

    
}
