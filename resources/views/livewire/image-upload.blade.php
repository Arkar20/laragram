<div>
    <x-alert-message />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    <div class=" mx-auto absolute top-30  shadow-sm rounded-lg lg:px-8">
                       {{-- <h1 class="text-center font-bold lg:text-6xl pt-4 text-4xl">Gallery</h1> --}}
            <div class="mx-4 rounded-md  ">
                <div class=" my-2 mx-6 bg-white rounded-lg text-xs sm:text-lg">
                    
                    <img src="{{Storage::url($ablum->image)}}" class="h-20 sm:h-32 object-cover w-full lg:h-60"/>
                    <div class="bg-white sm:text-sm flex  px-4 py-2">
                        <div class="profile ">
                             <img  class="w-20 h-20 rounded-full mx-auto " src="{{Storage::url($ablum->user->avatar)}}"/>
                            <div class="mx-auto my-2 ">
                                    <h4 class="text-center text-md tracking-wider uppercase text-gray-500">{{$ablum->user->name}}</h4>
                                            
                                    <livewire:follow :user="$ablum->user"/>

                                </div>
                            
                        </div>
                        <div class="font-semibold text-xs sm:py-2 sm:px-2  mx-4 sm:text-sm md:text-lg">
                            {{$ablum->slug}}
                            <p class="text-gray-600 text-xs itablic">Created At {{$ablum->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                
                </div>
                {{-- start of form --}}
                @can('view',$ablum)
                    <div class=" my-2 mx-6 bg-white rounded-lg text-xs sm:text-lg">
                            <form enctype="multipart/form-data" wire:submit.prevent="uploadPhotos" class="" >
                                    <label class="text-lg  tracking-wider">Image Upload</label>
                                    


                                    <div
                                        x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                                    >
                                        <!-- File Input -->
                                       <input wire:model="photos" type="file"  class="pt-4 w-3/4"/>
                                    @error('photos')
                                           <span class="text-red-500 text-sm block">{{$message}}</span>
                                    @enderror

                                        <!-- Progress Bar -->
                                        <div x-show="isUploading">
                                            <progress max="100" x-bind:value="progress"></progress>
                                        </div>
                                    </div>
                                    @if ($photos)
                                        <div class="border border-gray-600 flex w-1/4 mx-auto shadow-md rounded-lg">
                                                                
                                                                        <img src="{{$photos->temporaryUrl()}}" class="p-2"/>
                                                                
                                                                </div>
                                    @endif
                
                                    <x-button type="submit" class="bg-indigo hover:bg-indigo-dark text-white font-bold py-2 px-4 w-full inline-flex ">
                                    <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                                    </svg>
                                    <span class="ml-2">upload the images</span>
                                </x-button>
                            </form>
                             
                                        
                                    
                           
                    </div>
                    @endcan  
                {{-- end of form --}}
              <x-gallary :photos="$ablum->photos"/>
    </div>
              
            </div>
       
    </div>     
    
</div>


       