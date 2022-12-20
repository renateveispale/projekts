<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\File;

class Files extends Component
{
    public $files, $title, $body, $file_id;
    public $isOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->files = File::all();
        return view('livewire.file');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->file_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        File::updateOrCreate(['id' => $this->file_id], [
            'title' => $this->title,
            'body' => $this->body
        ]);

        session()->flash('message',
            $this->file_id ? 'File Updated Successfully.' : 'File Created Successfully.');

        $this->closeModal();
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

        $this->openModal();
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
