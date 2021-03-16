<div>
    <x-alert-message wire:loading wire:target="submitAblum"/>
    <div class=" mb-4 flex justify-center">
        <h2 class="text-3xl">Add New Ablum</h2>
    </div>
    <form wire:submit.prevent="storeAblum" enctype="multipart/form-data">
    <div class="p-10 ">

            <label class="block py-4">
                <span class="text-gray-700 mb-2">Name of the Ablum</span>
                <input type="text" wire:model="ablum" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
                  @error('ablum')
                      <span class="text-sm text-red-700">{{$message}}</span>
                  @enderror  
                

            </label>
            <label class="block py-4">
                <span class="text-gray-700 mb-2">Description of the Ablum</span>
                
                <textarea wire:model='desc' type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                </textarea>
                @error('desc')
                      <span class="text-sm text-red-700">{{$message}}</span>
                  @enderror 
             </label>
            <label class="block py-4">
                <span class="text-gray-700 mb-2">Category of the Ablum</span>
                <select wire:model="categoryid" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Choose Category</option>
                    @forelse ($categories as $category)
                     <option value="{{$category->id}}">{{$category->category}}</option>
                @empty
                     <option>No Categories in the database</option>
                @endforelse
                </select>
                 @error('categoryid')
                      <span class="text-sm text-red-700">{{$message}}</span>
                  @enderror 
            </label>
            <label class="block py-4">
                <span class="text-gray-700 mb-2">Image of the Ablum</span>
                <input type="file" wire:model="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
                 @error('image')
                      <span class="text-sm text-red-700">{{$message}}</span>
                  @enderror 
            </label>
    </div>
    <div>
         <div  class="mx-auto  max-w-3xl max-h-lg rounded overflow-hidden shadow-lg my-2">
            @if ($image)
                <img class="w-full" target="img/*" src="{{$image->temporaryUrl()}}" alt="{{$image}}">
                
            @endif    
              
    </div>
    {{-- <button type="submit " wire:click="storeAblum" class="btn text-grey-800 py-2 px-5 border border-grey-300 hover:bg-blue-900 hover:text-white rounded-lg shadow">Add</button> --}}
    <button type="submit" 
            
            class="inline-flex items-center px-4 py-4 border-2 border-grey-900 text-base leading-6 font-medium rounded-md text-gray-800 hover:bg-gray-900 hover:text-white active:bg-rose-700 transition ease-in-out duration-150 ">
        <svg wire:loading
            wire:target="storeAblum" class="animate-spin -ml-1 mr-3 h-5 w-5 text-grey-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Add
      </button>
</form>
</div>
