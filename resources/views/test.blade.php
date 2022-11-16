<x-app-layout>

<div class="flex">
      <div class="flex flex-col w-64 h-screen px-4 py-8 overflow-y-auto border-r">
        <h2 class="text-3xl font-semibold text-center text-indigo-500"><div>{{ Auth::user()->name }}</div></h2>


        <div class="flex flex-col justify-between mt-6">
          <aside>
            <ul>
              <li>
                <a class="flex items-center px-4 py-2 text-gray-700 bg-gray-100 rounded-md " href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-indigo-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg>

                  <span class="mx-4 font-medium text-indigo-500">Dashboard</span>
                </a>
              </li>

              <li>
                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-indigo-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>

                  <span class="mx-4 font-medium text-indigo-500">Settings</span>
                </a>
              </li>

              <li>
                
                <a class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200" href="#">

        <!-- What is term -->
        <div class="transition">
        <!-- header -->
        <div class="accordion-header cursor-pointer transition flex items-center">
            <i class="fas fa-plus"></i>
            <svg class="w-6 h-6 fill-indigo-500" height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M20 8h-12c-2.21 0-3.98 1.79-3.98 4l-.02 24c0 2.21 1.79 4 4 4h32c2.21 0 4-1.79 4-4v-20c0-2.21-1.79-4-4-4h-16l-4-4z"/><path d="M0 0h48v48h-48z" fill="none"/></svg>
            <span class="mx-4 font-medium text-indigo-500">Folders</span>
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
              

              <a class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200" href="#">

                <!-- What is term -->
                <div class="transition">
                <!-- header -->
                <div class="accordion-header cursor-pointer transition flex items-center">
                    <i class="fas fa-plus"></i>
                    <svg class="w-6 h-6 fill-indigo-500" height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M20 8h-12c-2.21 0-3.98 1.79-3.98 4l-.02 24c0 2.21 1.79 4 4 4h32c2.21 0 4-1.79 4-4v-20c0-2.21-1.79-4-4-4h-16l-4-4z"/><path d="M0 0h48v48h-48z" fill="none"/></svg>
                    <span class="mx-4 font-medium text-indigo-500">Folders</span>
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
        <div class="flex p-40 border-4 border-dotted">
          
        </div>
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