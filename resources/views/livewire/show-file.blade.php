<div><br>
    @foreach ($files as $file)
    <div class="m-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full">
        <div class="relative p-4 w-full bg-white rounded-lg overflow-hidden shadow hover:shadow-md cursor-pointer">
          <h3 class="text-base md:text-xl font-medium text-gray-800">
            {{$file->title}}
          </h3>

          <p class="mt-4 text-base md:text-lg text-gray-600">
            {{$file->body}}
          </p>
        </div>
    </div>
      @endforeach
</div>


