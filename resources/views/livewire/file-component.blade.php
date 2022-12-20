<div>
    @if($updateMode)
        @include('posts.update')
    @else
        @include('posts.create')
    @endif
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->body }}</td>
                <td>
                <button wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
