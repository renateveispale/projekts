
@include('layouts.header')

<div class=" h-full p-4 m-8 overflow-y-auto">

@livewire('post')

{{-- <div>
  <livewire:show-post :post="$post">
</div> --}}
</div>
@livewireScripts
</body>
