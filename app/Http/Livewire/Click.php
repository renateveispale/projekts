<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Events\StatusLiked;
use App\Models\File;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Click extends Component
{
    public $msg = '';
    public $userId = 1;
    const EVENT_VALUE_UPDATED = 'trix_value_updated';
    public $title;
    public $body;

    //returns click blade when page/component is rendered
    public function render()
    {
        return view('livewire.click');
    }
    //when clicked publishes event that outputs message in the output area
    public function trackClickEvt()
    {
        $this->emit(self::EVENT_VALUE_UPDATED, $this->value);
        $this->emit(event(new StatusLiked(Auth::user()->name, $this->body)));

    }


}
