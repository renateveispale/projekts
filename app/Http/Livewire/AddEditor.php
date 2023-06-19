<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddEditor extends Component
{
    public function render()
    {
        return view('livewire.add-editor');
    }

    // public function addCollab(){

    //     $username = $this->collab->username;
    //     $collaborators = DB::table('collaborators')->join('users', 'users.id', '=', 'collaborators.user_id');

    //     dd($collaborators);
    // }

}
