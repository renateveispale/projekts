<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FileComponent extends Component
{
    public $files, $title, $body, $file_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->files = File::all();
        return view('livewire.file-component');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        // File::create(['user_id' => Auth::user()->id]);


        $file = new File();

        $file->user_id = Auth::user()->id;

        $title = $file->title = $this->title;
        $body = $file->body = $this->body;
        $timestamp = Carbon::now()->toDateTimeString();
        $file->save();

        session()->flash('message', 'File Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $file = File::findOrFail($id);
        $this->file_id = $id;
        $this->title = $file->title;
        $this->body = $file->body;

        $this->updateMode = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $file = File::find($this->file_id);
        $file->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'File Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        File::find($id)->delete();
        session()->flash('message', 'File Deleted Successfully.');
    }
}
