<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Trix;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Events\StatusLiked;

class Post extends Component
{
    public $title;
    public $body;

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED // trix_value_updated()
    ];

    public function trix_value_updated($value){
        $this->body = $value;
        // $this->title = $title;
        $timestamp = Carbon::now()->toDateTimeString();

        DB::table('posts')
        ->where('user_id', Auth::user()->id)
        ->update(['body' => $value, 'updated_at' => $timestamp]);
    }

}

