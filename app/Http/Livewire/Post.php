<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Trix;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class Post extends Component
{
    public $title;
    public $body;
    public $user_id = 1;

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED // trix_value_updated()
    ];

    public function trix_value_updated($value){
        $this->body = $value;
    }

    public function save(){
        // dd([
        //     'title' => $this->title,
        //     'body' => $this->body
        // ]);

        $file = new File();

        $file->user_id = $this->user_id;
        $file->title = $this->title;
        $file->body = $this->body;



        $file->save();
    }

    public function render()
    {
        return view('livewire.post');
    }
}
