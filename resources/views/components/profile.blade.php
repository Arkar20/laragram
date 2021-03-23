<div>
   <div class=" justify-around pl-10 md:pl-5 hidden md:block lg:block">
            <div class="rounded rounded-t-lg overflow-hidden shadow max-w-xs my-3">
                <img src="https://images.pexels.com/photos/7082674/pexels-photo-7082674.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" class=" object-cover  w-full h-40" />
                <div class="flex justify-center -mt-8">
                    <img src="{{Storage::url($user->avatar)}}" class="rounded-full object-contain w-20 h-20 border-solid border-white border-2 -mt-3">		
                </div>
              <div class="text-center px-3 pb-6 pt-2">
                <h3 class="text-black text-sm bold font-sans">{{$user->name}}</h3>
                <livewire:follow :user="$user"/>
                  <p class="mt-2 font-sans font-light text-grey-dark">Hello, i'm from another the other side!</p>
              </div>
                <div class="flex justify-center pb-3 text-grey-dark">
                  <div class="text-center mr-3 border-r pr-3">
                    <h2>{{$user->myFollowers()->count()??'0'}}</h2>
                    <span>Followers</span>
                  </div>
                  <div class="text-center">
                    <h2>{{$user->getFollowingUsers()->count()}}</h2>
                    <span>Following</span>
                  </div>
                </div>
                <ul>
                  <a href="{{route('profile',$user->id)}}">
                    <li class="py-2 px-4 border border-grey-500 flex justify-around ">Abums <span class="px-3">{{$user->ablums->count()}}</span></li>

                  </a>
                  <li class="py-2 px-4 border border-grey-500 flex justify-around ">Photos <span class="px-3">30</span></li>
                </ul>
            </div>
        </div>
</div>