<?php

namespace App\Http\Livewire;

use App\Models\Posts;
use App\Models\Collaborators;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Events\StatusLiked;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShowPost extends Component
{
    public $post;
    public $collab;
    public $saveSuccess = false;
    public $errormessage = false;

    public function mount($slug){
        $this->post = Posts::where('slug', $slug)->orderBy('created_at', 'desc')->first();

    }

    public function render()
    {
        $user_id = $this->post->user_id;
        $posts = DB::table('posts')->where('user_id', Auth::user()->id)->get();
        
        $collaborators = DB::table('collaborators')->join('users', 'users.id', '=', 'collaborators.user_id')
        ->where('posts_id',$this->post->id)->get();

        $collaborator = 0;
        foreach($collaborators as $key => $val) {
            if (Auth::user()->id == $collaborators[$key]->user_id){
                $collaborator = $collaborators[$key]->user_id;
                
            }
        }
        
        return view('livewire.edit-post', ['user_id' => $user_id, 'posts' => $posts, 'collaborator' => $collaborator, 'collaborators' => $collaborators]);
    }

    protected $rules = [
        'post.title' => 'required|min:1',
        'post.body' => 'required|min:1',
    ];

    public function editPost(){
        
        $title = $this->post->title;
        $body = $this->post->body;
        $slug = Str::slug($this->post->slug);
        $timestamp = Carbon::now()->toDateTimeString();

        // dd($check_file_count);

        DB::table('posts')
            ->where('user_id', Auth::user()->id)
            ->where('slug', $slug)
            ->update(['body' => $body, 'title' => $title, 'updated_at' => $timestamp]);

        // $this->emit(event(new StatusLiked(Auth::user()->name, $this->post->body, $this->post->title)));
        $this->saveSuccess = true;

    }

    public function addCollab(){

        $collaborators = DB::table('collaborators')->join('users', 'users.id', '=', 'collaborators.user_id');
        $username = $this->collab;
        $users = DB::table('users')->where('name', $username)->get();
        if (count($users) > 0) {
            $this->collab = new Collaborators();
            $this->collab->user_id = $users[0]->id;
            $this->collab->posts_id = $this->post->id;
            $this->collab->save();
        }
        else{
            $this->errormessage = true;
            // return redirect('post/'. $this->post->slug);
        }
    }

    public function publishPost()
    {
        $post_id = $this->post->id;
        $timestamp = Carbon::now()->toDateTimeString();

        $isEditor = DB::table('posts')
            ->join('collaborators', 'posts.id', '=', 'collaborators.posts_id')
            ->join('users', 'users.id', '=', 'collaborators.user_id')->get();

        foreach ($isEditor as $key => $value) {
            // dd($isEditor[$key]);
            if ($isEditor[$key]->user_id == Auth::user()->id){
                // dd($isEditor[$key]->user_id);
                DB::table('posts')
                    ->where('user_id', Auth::user()->id)
                    ->update(['featured' => 1, 'updated_at' => $timestamp]);
            }
        }
        

    }

}