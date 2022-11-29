<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Click extends Component
{
    public $msg = '';
    public $userId = 1;
   
    public function render()
    {
        return view('livewire.click');
    }
   
    public function clickEvt()
    {
        $this->msg = "Button has been clicked.";
        
    }
   
    public function trackClickEvt($userId)
    {
        $this->msg = $userId;
    }

    
}