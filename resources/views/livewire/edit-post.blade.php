<div>
    <div class="container mx-auto px-4">
    <div class=" grid grid-rows-1 grid-flow-col gap-4">
    <div class="col-span-8">


        @if (Auth::check() && (Auth::user()->id == $user_id || Auth::user()->id == $collaborator))
        <h1 class="text-4xl mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">Edit Post</h1>
        
        <p class="text-lg mt-2 text-gray-600">Start crafting your new post below.</p>
        <br>
        <div onclick="toggleModal()" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer">Add Editor</div>

        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">

            @if($saveSuccess)
                <div class="rounded-md bg-green-100 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">Successfully Saved Post</h3>
                            <div class="mt-2 text-sm text-green-700">
                                <p>Your new post has been saved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @livewire('post')

            <div wire:click="editPost" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer">Submit Post</div>
            <div wire:click="publishPost" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-green-500 border border-transparent rounded-md hover:bg-green-600 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 cursor-pointer">Publish Post</div>

        </div>
        
    @else
        
    <div>
        <h1 id = "text-title" class="text-4xl mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">{{ $post->title }}</h1>
        <br>
        <div class="text-base md:text-xl font-medium text-gray-800">
            <p id = "text-body">{!! $post->body !!}</p>
        </div>
    </div>

    @endif

    </div>
    <div class="col-span-1">

        <h1 class="text mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">Contributors</h1>
        <p class="text-lg mt-2 text-gray-600">People that are editing this post.</p>
        <br>
        @foreach ($collaborators as $collaborator)
        <div class="flex justify-center text-6xl border-2 border-gray-300 p-2 bg-white rounded-lg overflow-hidden shadow">
            <div class="relative p-4 w-full overflow-hidden">
              <h3 class="text-base md:text-xl font-medium text-gray-800">
                {{$collaborator->name}}
              </h3>
          </div>
        </div>
        <br>
        @endforeach

        <br>

        @if($errormessage)
        <br>
        <div class="rounded-md bg-red-100 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Editor couldn't be added</h3>
                    <div class="mt-2 text-sm text-red-700">
                        <p>Username doesn't exist</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
</div>
        


    </div>  
</div>

{{-- modal window --}}
  <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-900 opacity-75">
      </div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
      <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:col-span-6">
                <label for="collab" class="block text-sm font-medium text-gray-700">
                    Add username or email of your collaborator
                </label>
                <div class="mt-1">
                    <input wire:model="collab.name" id="collab" name="collab" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>
            </div>
        </div>
        <div class="bg-gray-200 px-4 py-3 text-right">
          <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" onclick="toggleModal()"><i class="fas fa-times"></i> Cancel</button>
          <button id="collab" wire:click="addCollab" type="button" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2"><i class="fas fa-plus"></i> Add</button>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.pusher')
  
  <script>

    function toggleModal() { 

        document.getElementById('modal').classList.toggle('hidden')

    }
    var pusher = new Pusher('486966c05c3e722f0e09', {
		    encrypted: true,
        cluster: "eu",
	  });
      
    var channel = pusher.subscribe('status-liked');
    channel.bind('my-event', function(data) {

        var title = document.getElementById("title");
        title.append(title + data);

        alert(JSON.stringify(data));
    });

    function buttonClick(){
        
        document.getElementById("myAnchor").addEventListener("click", function(event){
        event.preventDefault()
        });
    }

  </script>
