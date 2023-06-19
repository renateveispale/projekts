@include('layouts.header')

<div class="max-w-screen-lg mx-auto">
    <!-- header navigation -->
    <header class="flex justify-center items-center py-2">

      <button class="block md:hidden px-2 text-3xl">
        <i class='bx bx-menu'></i>
      </button>
      <ul class="hidden md:inline-flex items-center">
        <li class="px-2 md:px-4">
          <a href="" class="text-green-800 font-semibold hover:text-green-600"> Home </a>
        </li>
        </li>
        <li class="px-2 md:px-4 hidden md:block">
          <a href="/login" class="text-gray-500 font-semibold hover:text-green-600"> Login </a>
        </li>
        <li class="px-2 md:px-4 hidden md:block">
          <a href="/register" class="text-gray-500 font-semibold hover:text-green-600"> Register </a>
        </li>
      </ul>

    </header>
    <!-- header navigation ends here -->

    <main class="mt-12">
      <!-- featured section -->
      <div class="flex flex-wrap md:flex-no-wrap space-x-0 md:space-x-6 mb-16">
        <!-- main post -->
        <div class="mb-4 lg:mb-0  p-4 lg:p-0 w-full md:w-4/7 relative rounded block">
          <img src="https://images.unsplash.com/photo-1427751840561-9852520f8ce8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" class="rounded-md object-cover w-full h-64">
          <span class="text-green-700 text-sm hidden md:block mt-4"> Technology </span>
          <h1 class="text-gray-800 text-4xl font-bold mt-2 mb-2 leading-tight">
            Ignorant branched humanity led now marianne too.
          </h1>
          <p class="text-gray-600 mb-4">
            Necessary ye contented newspaper zealously breakfast he prevailed. Melancholy middletons yet understood
            decisively boy law she. Answer him easily are its barton little. Oh no though mother be things simple
            itself.
            Oh be me, sure wise sons, no. Piqued ye of am spirit regret. Stimulated discretion impossible admiration in particular conviction up.
          </p>
          <a href="./blog.html" class="inline-block px-6 py-3 mt-2 rounded-md bg-blue-700 text-gray-100">
            Read more
          </a>
        </div>

        <!-- sub-main posts -->
        <br>
        <div class="w-full md:w-4/7">
            <br><br>
          <!-- post 1 -->
          <h2 class="font-bold text-3xl">Latest posts</h2>
          <br><br>
          <livewire:add-editor>
      <!-- end featured section -->


    

    </main>
    <!-- main ends here -->
    <br>
    <!-- footer -->
    
    <footer class="border-t mt-12 pt-12 pb-32 px-4 lg:px-0">

    </footer>
  </div>

@livewireScripts

