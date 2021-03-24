<div >
    
                  
                                    
    <a class="text-gray-400 text-sm cursor-pointer font-semibold ml-6" >{{$ablum->comments->count()}} Comments</a>


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
