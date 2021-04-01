    <x-app-layout>

<script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
        <x-alert-message />

        <div class="md:py-12 sm:py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-center font-bold lg:text-6xl py-4 text-4xl ">NewsFeed</h1>
                <div class=" flex justify-center m-3">
                           
<div class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl w-full">
                         
                @forelse ($ablums as $ablum)
                                        
                <div div class="bg-white max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl rounded overflow-hidden shadow-none mb-10 sm:rounded-lg max-w-2xl border border-gray-300">
                            <header class="flex flex-start">
                                    <div>
                                        <a href="{{route('photos.gallary',$ablum->id)}}" class="cursor-pointer m-4 flex items-center text-sm outline-none focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                            <img src="{{Storage::url($ablum->user->avatar)}}" class="h-9 w-9 rounded-full object-cover"
                                            alt="usuario" />
                                            <div>
                                                <p class="inline ml-2 font-bold">{{$ablum->user->name}}</p>
                                               
                                                <span class="inline text-xs text-gray-600">
                                                    {{$ablum->name}}
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </header>
                                <img class="w-full sm:object-cover lg:h-80 sm:h-50"
                                src="{{Storage::url($ablum->image)}}"
                                    alt="post">

                                <div class="px-6 pt-4" x-data="{ show: false }">
                                   <livewire:react-section :ablum="$ablum"/>
                <div x-show="show">
                             <livewire:comment-section  :ablum="$ablum"/>     

                </div>


      
                        </div>
                        </div>
                                    
                                    {{-- <livewire:comment-section :ablum="$ablum"/> --}}
                                            
                                            @empty
                                    <p>No Ablums Found</p> 
                                    @endforelse
                                            </div>                                     
                       <div>
                                                          <x-profile :user="auth()->user()"/>    

                    </div>   
               
                    </div>
                    
            </div>
        </div>
    
</x-app-layout>
