<div>

@foreach($posts as $key => $val)
  <a href="post/{{$posts[$key]->slug}}">
    <div class="border-2 border-gray-300 rounded w-full flex flex-col md:flex-row mb-10">
      {{-- <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="block md:hidden lg:block rounded-md h-64 md:h-32 m-4 md:m-0" /> --}}
      <div class="bg-white rounded px-4">
        <div class="md:mt-0 text-gray-800 font-semibold text-xl mb-2">
          {{$posts[$key]->title}}
        </div>
        <p class="block p-2 pl-0 pt-1 text-sm text-gray-600">
          {{ Str::limit($posts[$key]->body, 100) }}        
        </p>
      </div>
    </div>
  </a>
@endforeach

</div>