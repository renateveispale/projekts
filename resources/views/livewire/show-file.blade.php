<div><br>
  <div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach ($files as $file)
      <div class="flex justify-center text-6xl border-2 border-gray-300 p-6 bg-white rounded-lg overflow-hidden shadow hover:shadow-md cursor-pointer">

        <div class="relative p-4 w-full overflow-hidden">
          <h3 class="text-base md:text-xl font-medium text-gray-800">
            {{$file->title}}
          </h3>

          <p class="mt-4 text-base md:text-lg text-gray-600">
            {{$file->body}}
          </p>
          <br>
          <p class="text-sm">Contributors: {{$file->name}}</p>

        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
