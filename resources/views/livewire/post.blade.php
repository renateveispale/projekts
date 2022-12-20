<div>
    <div>
        <label for="title" style="display:block">Title</label>
        <input type="text" style="border:1px solid #ccc" id= "title" name="title" wire:model.lazy="title" value="{{ $title }}">
    </div>
    <div>
        <livewire:trix :value="$body">
    </div>

    <div>
        <button wire:click="save">Save</button>
    </div>

</div>

