<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\File;
use Illuminate\Support\Facades\DB;

class ShowFile extends Component
{
    public function render()
    {
        //returns all files from db
        return view('livewire.show-file', [
            'files' => DB::table('files')
            ->join('users', 'users.id', '=', 'files.user_id')
            ->get()
        ]);


    }
}
