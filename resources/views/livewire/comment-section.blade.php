<div>
    <x-alert-message />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
<div class="bg-white max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl rounded overflow-hidden shadow-none mb-10 sm:rounded-lg max-w-2xl border border-gray-300">
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

                                <div class="px-6 pt-4" x-data="{show: false}">
                                    <div class="mb-2">
                                        <div class="flex items-center">
                                            <span class="mr-3 inline-flex items-center cursor-pointer">
                                                <svg class="fill-heart text-gray-700 inline-block h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </span>
                                            <span class="mr-3 inline-flex items-center cursor-pointer" @click="show= !show" >
                                                <svg class="text-gray-700 inline-block h-7 w-7 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                            </span>
                                        </div>
                                        <span class="text-gray-600 text-sm font-bold" >1,300 Likes</span>
                                    </div>
                                  

                               <div class=""  >
                                   <div x-show="show">
                                       <x-show-comment   :ablum="$ablum"/>

                                   </div>
                                        <a class="text-gray-400 text-sm cursor-pointer font-semibold" @click="show=!show">{{$ablum->comments->count()}} Comments</a>
                                    </div>
                                </div>

                                <div class="px-6 pt-4 pb-3">
                                    <form wire:submit.prevent="addComment" method="POST" class="flex items-start">
                                        <input hidden  value="{{$ablum->id}}" wire:model="ablumid" />
                                        <input wire:model="comment" class="w-full block resize-none outline-none appearance-none p-2" aria-label="Comment" placeholder="Comment"  autocomplete="off" autocorrect="off" style="height: 36px;"/>
                                      
                                        {{-- <button class="mb-2 focus:outline-none border-none bg-transparent text-blue-600">Publicar</button> --}}
                                    <x-button wiretype="submit" class="ml-2">Comment</x-button>
                                    </form>
                                      @error('comment')
                                            <p class="text-red-600 text-sm flex-none">{{$message}}</p>
                                        @enderror
                                </div>
                            </div>
</div>