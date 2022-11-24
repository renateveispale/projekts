<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LiveText extends Component
{
    public $message = 'Hey!';
    
    public function render()
    {
        
        return view('livewire.live-text');
    }
}