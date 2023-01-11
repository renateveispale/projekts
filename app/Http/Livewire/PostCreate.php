<?php

namespace App\Http\Livewire;

use App\Models\Posts;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Events\StatusLiked;
use Illuminate\Support\Facades\Auth;

class PostCreate extends Component
{
    public $saveSuccess = false;
    public $post;

    protected $rules = [
        'post.title' => 'required|min:1',
        'post.body' => 'required|min:1',
    ];

    public function mount(){
        $this->post = new Posts;
    }

    public function savePost(){
        
        $this->post->user_id = Auth::user()->id;
        $this->post->slug = Str::slug($this->post->title);
        $this->post->save();
        $this->emit(event(new StatusLiked(Auth::user()->name, $this->post->body, $this->post->title)));
        $this->saveSuccess = true;
    }
    
    public function render()
    {
        return view('livewire.post-create');
    }

    
}
