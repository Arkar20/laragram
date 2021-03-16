<div>
    <form enctype="multipart/form-data" wire:submit.prevent="uploadPhotos">
        <div class="flex justify-center">
            <label>Image Upload</label>
            <input wire:model="photos" type="file" multiple="multiple"/>
            <x-button class="m-2" type="submit">
                      Upload
        </x-button>
        </div>
        
    </form>
</div>
