<x-app-layout>

    <div class="flex">
        <div class="flex flex-col w-64 h-screen px-4 py-8 overflow-y-auto border-r">
          <h2 class="text-3xl font-semibold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500"><div>{{ Auth::user()->name }}</div></h2>
  
  
          <div class="flex flex-col justify-between mt-6">
            <aside>
              <ul>
    
          <div class="transition">
          <!-- header -->
          <div class="accordion-header px-4 py-2 mt-5 cursor-pointer transition flex items-center rounded-md hover:bg-gray-200">
  
              <i class="fas fa-plus"></i>
              {{-- list name --}}
              <svg class="w-6 h-6 fill-indigo-500" height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M20 8h-12c-2.21 0-3.98 1.79-3.98 4l-.02 24c0 2.21 1.79 4 4 4h32c2.21 0 4-1.79 4-4v-20c0-2.21-1.79-4-4-4h-16l-4-4z"/><path d="M0 0h48v48h-48z" fill="none"/></svg>
              {{-- list name --}}
              <span class="mx-4 font-medium text-indigo-500 select-none">Folders</span>
          </div>
          <!-- Content -->
          <div class="accordion-content px-5 pt-0 overflow-hidden max-h-0">
              <ul class="px-5">
                <li>hello</li>
                <li>hello</li>
              </ul>
  
          </div>
          </div>
                  </a>
                </li>
              
                  <div class="transition">
                  <!-- header -->
                  <div class="accordion-header px-4 py-2 mt-5 cursor-pointer transition flex items-center rounded-md hover:bg-gray-200">
                      <i class="fas fa-plus"></i>
                      {{-- list icon --}}
                      <svg class="w-6 h-6 fill-indigo-500" height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M20 8h-12c-2.21 0-3.98 1.79-3.98 4l-.02 24c0 2.21 1.79 4 4 4h32c2.21 0 4-1.79 4-4v-20c0-2.21-1.79-4-4-4h-16l-4-4z"/><path d="M0 0h48v48h-48z" fill="none"/></svg>
                      {{-- list name --}}
                      <span class="mx-4 font-medium text-indigo-500 select-none">Folders</span>
                  </div>
                  <!-- Content -->
                  <div class="accordion-content px-5 pt-0 overflow-hidden max-h-0">
                      <ul class="px-5">
                        <li>hello</li>
                        <li>hello</li>
                      </ul>
          
                  </div>
                  </div>
                          </a>
                        </li>
                        
                      </ul>
              </ul>
  
            </aside>
            
          </div>
        </div>
        <div class="w-full h-full p-4 m-8 overflow-y-auto">
          <livewire:live-text/> 

        </div>
    
    
  
  <style>
      .accordion-content {
      transition: max-height 0.3s ease-out, padding 0.3s ease;
      }
  </style>
  
  <script>
      const accordionHeader = document.querySelectorAll(".accordion-header");
      accordionHeader.forEach((header) => {
      header.addEventListener("click", function () {
          const accordionContent = header.parentElement.querySelector(".accordion-content");
          let accordionMaxHeight = accordionContent.style.maxHeight;
  
          // Condition handling
          if (accordionMaxHeight == "0px" || accordionMaxHeight.length == 0) {
          accordionContent.style.maxHeight = `${accordionContent.scrollHeight + 32}px`;
          header.querySelector(".fas").classList.remove("fa-plus");
          header.querySelector(".fas").classList.add("fa-minus");
          } else {
          accordionContent.style.maxHeight = `0px`;
          header.querySelector(".fas").classList.add("fa-plus");
          header.querySelector(".fas").classList.remove("fa-minus");
  
          }
      });
      });
  </script>


    
</x-app-layout>
