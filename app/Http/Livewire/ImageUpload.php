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
    public $rules = [];
    public function render()
    {
        return view('livewire.image-upload');
    }
    public function uploadPhotos()
    {
        foreach ($this->photos as $photo) {
            $imgname = uniqid() . '' . $photo->getClientOriginalName();

            Image::create([
                'image' => $photo->storeAs('public/photos', $imgname),
                'ablum_id' => $this->ablum->id,
            ]);
        }
    }
}
