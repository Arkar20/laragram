<div>
@foreach ($comments as $comment)
    

<div class="flex flex-start items-center my-4 space-x-3">   
                <div class="flex-none avatar-img ">
                                            <img src="{{Storage::url($ablum->user->avatar)}}" class="w-14 h-14 rounded-full object-cover"/>
                </div>
                <div class="name">
                    <p class="inline text-md text-gray-900 font-semibold">{{$comment->user->name}}</p>
                    <span class="text-sm font-light text-gray-500 cursor-pointer" wire:click="edit({{$comment->id}})">Edit</span>
                    
                    <span class="text-sm font-light text-gray-500 cursor-pointer" wire:click="delete({{$comment->id}})">Delete</span>
                @if ($updatecmt==$comment->id && $showeditbox)
                    <div class="block my-4">
                         <form class="flex justify-center mt-3" wire:submit.prevent='updateCmt'>
                                 <input wire:model="txtcommentupdate" class="w-full block resize-none outline-none rounded-md appearance-none p-2 border border-gray-700 mr-3" aria-label="Comment" placeholder="Comment"  autocomplete="off" autocorrect="off" style="height: 36px;"/>
                                <x-button>update</x-button>
                        </form>
                      </div>
                @endif
                    
                    <div class="block">
                       {{$comment->comment}}
                    </div>
                </div>
                
            </div>

@endforeach
       
            <div class="total-cmt text-sm text-gray-500 cursor-pointer">
                <p class="py-2">{{$ablum->comments->count()}} Comments</p>
            </div>

            <div class="comment-box mx-auto ">
                <form class="flex justify-center mt-3" wire:submit.prevent='addComment'>
                        <input wire:model="txtcomment" class="w-full block resize-none outline-none rounded-md appearance-none p-2" aria-label="Comment" placeholder="Comment"  autocomplete="off" autocorrect="off" style="height: 36px;"/>
                    <x-button>Comment</x-button>
                </form>
                    @error('txtcomment')
                        <div class="text-sm text-red-500 flex-none mb-6">This is error msg</div>
                    @enderror
                                          
                
            </div>

</div>
