<x-app-layout>

        <div class="w-full h-full p-4 m-8 overflow-y-auto">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl mt-32 text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                    Your posts will appear here
                </h1>

                <livewire:show-all-posts >

              </div>

        </div>

@include('layouts.pusher')
</x-app-layout>
