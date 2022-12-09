<x-app-layout>
@include("layouts.sidebar")
        <div class="w-full h-full p-4 m-8 overflow-y-auto">
          <textarea val = "Input" id = "input_field" rows="4" type="text" name="message" class="block p-2.5 w-96 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"></textarea>
          <h1 id = "text-area"></h1>
        </div>

@include('layouts.pusher')
</x-app-layout>
