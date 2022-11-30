<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Events\StatusLiked;

class Click extends Component
{
    public $msg = '';
    public $userId = 1;
    const EVENT_VALUE_UPDATED = 'trix_value_updated';

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
        $this->emit(self::EVENT_VALUE_UPDATED, $this->value);
        $this->emit(event(new StatusLiked(Auth::user()->name)));
        
    }

    
}