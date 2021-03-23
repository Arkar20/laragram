<div>
      @if (!auth()->user()->is($user))
   <x-button wire:click="follow()">
 
       
 
    @if(auth()->user()->isFollow($user->id))
        Unfollow
    @else
    Follow
    @endif

   </x-button>
     @endif
</div>
