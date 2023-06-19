<div><br>

    <div class="container mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="h-50 flex justify-center text-6xl border-2 border-gray-300 bg-grey rounded-lg overflow-hidden shadow hover:shadow-md cursor-pointer">
        <a href="post/create" class="bg-grey">
            <div class="mt-16 relative p-4 w-full overflow-hidden">
              <h1 class="text-4xl text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                +
              </h1>
            </div>
          </a>
        </div>

        @foreach ($posts as $post)
        <div class="h-50 flex justify-center text-6xl border-2 border-gray-300 p-6 bg-white rounded-lg overflow-hidden shadow hover:shadow-md cursor-pointer">
        <a href="post/{{$post->slug}}">
          <div class="relative p-4 w-full overflow-hidden">
            <h3 class="text-base md:text-xl font-medium text-gray-800">
              {{$post->title}}
            </h3>
  
            <p class="mt-4 text-base md:text-lg text-gray-600 inline-block">
              {{ Str::limit($post->body, 10) }}

            </p>
            <br>
            <p class="mt-4 text-base md:text-lg text-gray-600">
              Created by: {{$post->name}}
            </p>
          </div>
        </a>
        </div>
        @endforeach

      </div>
    </div>

  </div>
  