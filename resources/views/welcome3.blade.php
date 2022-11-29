
@include('layouts.header')
  
<div class=" h-full p-4 m-8 overflow-y-auto">


  <form class="w-full max-w-sm">
    <div class="md:flex md:items-center mb-6">

    <textarea id = "input_field" rows="4" type="text" name="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"></textarea>

  
    <div class="md:flex md:items-center">
      <div class="md:w-1/3"></div>
      <div class="md:w-2/3">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
          Sign Up
        </button>
      </div>
    </div>
  </form>

</div>

@livewireScripts
</body>
