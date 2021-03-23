<div>
      <x-alert-message />

    
      
<div>
    <div class="flex">
        <div class="justify-around lg:w-3/4 md:w-full sm:w-full  h-100  ">
          @forelse ($ablums as $ablum)
   
            <div  class="w-full rounded  shadow-lg my-2">
                      <img class="w-full object-cover h-80" src="user2.jpg" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                  <div class="font-bold text-xl mb-2">{{$ablum->name}}</div>
                  <p class="text-grey-darker text-base">
                  {{$ablum->slug}}
                  </p>  
                </div>
                <div class="px-6 py-4">
                  <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#{{$ablum->category->category}}</span>
                </div>
                @can('view',$ablum)
                    <x-button class="m-2">
                      <a href="{{ route('ablum.edit',$ablum->id) }}">Edit</a>
                    </x-button>
                  <form wire:submit.prevent="deleteAblum({{$ablum->id}})"  class="inline">
               <x-button 
                   
                    
                    class="m-2 bg-red-800 hover:bg-red-600"
                    
                    >
                    Delete
                    </x-button>
                  </form>
                 
                @endcan
                <x-button class="m-2">
                      <a href="{{ route('photos.gallary',$ablum->id) }}">View Ablum</a>
                    </x-button>
              </div>
       
    
    @empty
        <div class="text-4xl text-grey-900 flex justify-center items-center ">
           No Alblums Found
        </div>
    @endforelse
      
        </div>
    </div>
    <x-profile :user="auth()->user()"/>
</div>
</div>
</div>