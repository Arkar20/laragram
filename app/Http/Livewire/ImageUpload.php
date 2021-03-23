<?php

namespace App\Http\Livewire;

use App\Models\Ablum;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Request;

class ImageUpload extends Component
{
    use WithFileUploads;

    public $photos;
    public Ablum $ablum;
    public $rules = ['photos' => 'required'];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.image-upload');
    }
    public function uploadPhotos()
    {
        $this->validate();
        if ($this->photos) {
            Image::create([
                'image' => $this->photos->storeAs(
                    'public/photos',
                    uniqid() . '' . $this->photos->getClientOriginalName()
                ),
                'ablum_id' => $this->ablum->id,
            ]);

            $this->ablum = Ablum::find($this->ablum->id);
            $this->photos = '';
        }

        $this->alert('success', 'Images uploaded Successful', [
            'position' => 'bottom-end',
            'timer' => 6000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => '&times;',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);
    }
}
