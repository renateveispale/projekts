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
    }

    public function save(){
        dd([
            'title' => $this->title,
            'body' => $this->body
        ]);


        // $file = new File();

        // $file->user_id = Auth::user()->id;

        // $title = $file->title = $this->title;
        // $body = $file->body = $this->body;
        // $timestamp = Carbon::now()->toDateTimeString();

        // $fileList = File::where('id', '>', 0)->get();
        // $fileCount = $fileList->count();

        // // $file->save();
        // $check_file_count = DB::table("files")
        // ->where("user_id", "=", Auth::user()->id) // "=" is optional
        // ->get();

        // // dd($check_file_count);

        // if ( count($check_file_count) > 0){
        //     DB::table('files')
        //     ->where('user_id', Auth::user()->id)
        //     ->update(['body' => $body, 'title' => $title, 'updated_at' => $timestamp]);
        // }

        // // File::where('user_id',  Auth::user()->id)
        // // ->update([$body->body]);
        // else{
        //     $file->save();
        //     dd($check_file_count);
        // }
    }

}
    //returns post view on render
