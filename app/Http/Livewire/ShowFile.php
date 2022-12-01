<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\File;

class ShowFile extends Component
{
    public function render()
    {

        return view('livewire.show-file', [
            'files' => File::all()
        ]);

    }
}
