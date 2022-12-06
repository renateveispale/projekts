<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPosts extends Component
{
    public $post;

    protected $listeners = ['postAdded' => 'incrementPostCount'];

    public function postAdded(Post $post)
    {
        $this->postCount = Post::count();
        $this->recentlyAddedPost = $post;
    }

    public function render()
    {
        return view('livewire.show-posts');
    }

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function incrementPostCount()
    {
        $this->postCount = Post::count();
    }
}
