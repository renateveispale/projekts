<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\File;

class ShowFile extends Component
{
    public function render()
    {
        //returns all files from db
        return view('livewire.show-file', [
            'files' => File::all()
        ]);

    }
}
