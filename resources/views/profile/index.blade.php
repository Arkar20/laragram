    <x-app-layout>
       <x-alert-message />
        <div class="md:py-12 sm:py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-center font-bold lg:text-6xl py-4 text-4xl ">NewsFeed</h1>
                <div class=" flex justify-center m-3">
                    <div class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl w-full">

                        <x-newsfeed :ablums="$user->ablums"/>
                    </div>
                        <div>
                         <x-profile :user="$user"/>
                           
                                </div>
                    </div>
                  
                </div>
        </div>
    </div>
       
    
</x-app-layout>

