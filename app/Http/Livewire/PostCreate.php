<?php

namespace App\Http\Livewire;

use App\Models\Posts;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Events\StatusLiked;
use App\Models\Collaborators;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostCreate extends Component
{
    public $saveSuccess = false;
    public $post;
    public $collaborators;

    protected $rules = [
        'post.title' => 'required|min:1',
    ];
    

    public function mount(){
        $this->post = new Posts;
        $this->collaborators = new Collaborators();
    }

    public function savePost(){
        
        $this->post->user_id = Auth::user()->id;
        $new_slug = Str::slug($this->post->title);
        $existing_posts = DB::table('posts')->where('slug', $new_slug)->get();

        if (count($existing_posts) > 0) {
            $this->post->slug = Str::slug($this->post->title . '-' . Str::random());
        }
        else{
            $this->post->slug = $new_slug;
        }
        $this->post->save();
        $this->emit(event(new StatusLiked(Auth::user()->name, $this->post->body, $this->post->title)));
        $this->saveSuccess = true;


        $this->collaborators->user_id = Auth::user()->id;
        $this->collaborators->posts_id = $this->post->id;
        $this->collaborators->save();

        return redirect('/dashboard');
    }
    
    public function render()
    {
        return view('livewire.post-create');
    }

    
}
