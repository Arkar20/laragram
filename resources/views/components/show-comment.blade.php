<div>
    @foreach ($ablum->comments as $comment) 
        <div class="text-sm mb-2 flex flex-start items-center">
            <div v-if="showUserImage">
                <a href="#" class="cursor-pointer flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                    <img class="h-8 w-8 rounded-full object-cover"
                    src="{{Storage::url($ablum->user->avatar)}}"
                    alt="usuario" />
                </a>
            </div>
            
                <p class="font-bold ml-2">
                <a class="cursor-pointer">{{$ablum->user->name}}:</a>
                <span class="text-gray-700 font-medium ml-1">
                    {{$comment->comment}}
                </span> 
            @can('view',$comment)
                
        
             <span class="uppercase text-gray-300 cursor-pointer" wire:click="$edit({{$comment->comment}})">Edit</span>
                &middot;
     <span class="uppercase text-gray-300">delete</span>
         @endcan
                    
            </p>
            
        </div>
    @endforeach
</div>