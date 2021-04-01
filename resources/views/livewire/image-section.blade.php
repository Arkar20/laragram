<div>
<div class="images-section flex justify-center">
                <div class="images-section w-2/3 my-6 mx-4 grid grid-cols-3 space-y-2 gap-7">
                @forelse ($images as $image)
                    <div class="single Image border border-gray-200 shadow-md">
                            <div class="image my-4">
                                <img src="{{Storage::url($image->image)}}" class="object-cover"/>
                            </div>
                            <div class="alblum bg-white px-4  ">
                                <div class="user-info flex justify-start space-x-3 my-3">
                                    <div class="avatar">
                                                <img src="{{Storage::url($user->avatar)}}" class="w-12 h-12 rounded-full " />
                                        </div>
                                        <div class="img-desc ">
                                            <p class="text-md font-semibold uppercase">{{$user->name}}</p>
                                            <p class="text-gray-400 text-xs italic">{{$image->created_at->diffForHumans()}}</p>
                                        </div>
                                </div>
                            <div class="desc mt-4">
                                <p class="text-md">{{$image->ablum->slug}}</p>

                                <span class="py-4 mx-auto font-bold">#{{$image->ablum->category->category}}</span>
                            </div>

                            </div>
                        </div>
                @empty
                    <p>Empty Images</p>
                @endforelse
                    
                </div>
                  <div class="profile ">
                        <x-profile :user="$user" />
                  </div>
       </div>
       <div>
                        {{$images->links()}}
                    </div>
</div>
