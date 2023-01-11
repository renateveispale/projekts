<?php

namespace App\Http\Livewire;

use App\Models\Posts;
use Livewire\Component;
use App\Events\StatusLiked;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShowPost extends Component
{
    public $post;
    public $saveSuccess = false;

    public function mount($slug){
        $this->post = Posts::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.show-post');
    }

    

    protected $rules = [
        'post.title' => 'required|min:1',
        'post.body' => 'required|min:1',
    ];

    public function savePost(){
        $this->post = new Posts;
        $this->post->user_id = Auth::user()->id;
        $this->post->slug = Str::slug($this->post->title);
        $this->post->save();
        $this->emit(event(new StatusLiked(Auth::user()->name, $this->post->body, $this->post->title)));
        $this->saveSuccess = true;
    }

}