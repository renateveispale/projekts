<div>
    <div class="max-w-4xl mx-auto py-20">

        <h1 id = "title-area" class="text-xl md:text-6xl xl:text-7xl font-bold tracking-tight mb-12 text-center">{{ $post->title }}</h1>
        <h1 id = "text-area" class = "text">{!! $post->body !!}</h1>
        
    </div>

    <livewire:post >
    
@include('layouts.pusher')
</div>