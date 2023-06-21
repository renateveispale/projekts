<?php

namespace App\Http\Livewire;

use App\Events\StatusLiked;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Trix extends Component
{
    use WithFileUploads;

    const EVENT_VALUE_UPDATED = 'trix_value_updated';

    public $value;
    public $title;
    public $trixId;
    public $photos = [];

    public function mount($value = '',){
        $this->value = $value;
        $this->trixId = 'trix-' . uniqid();

    }

    // emits event on updated trix editor
    public function updatedValue($value){
        $this->emit(self::EVENT_VALUE_UPDATED, $this->value);
        $this->emit(event(new StatusLiked(Auth::user()->name, $this->value, $this->title)));
        
    }


    public function render()
    {

        return view('livewire.trix');

    }
}
