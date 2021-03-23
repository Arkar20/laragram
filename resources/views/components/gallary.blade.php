<div>
       <div class="px-8 py-6 bg-gray-900 m-1">
                    <div class="text-4xl text-center tracking-wide uppercase text-white font-bold">
                        Images
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 mt-10 ">
                        @foreach ($photos  as $item)
                        <div class="ml-3 mt-3">
                            <img src="{{Storage::url($item->image)}}" class="border border-gray-700 shadow rounded-md object-contain w-80 h-40 sm:h-60 md:h-70 lg:h-80"/>
                        </div>        
                        @endforeach
                    
                        
                    </div>



                </div>
</div>