<?php

namespace App\Http\Livewire;

use App\Models\Ablum;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class AblumCreate extends Component
{
    use WithFileUploads;

    public $ablum;
    public $categoryid;
    public $desc;
    public $image;
    public $rules = [
        'ablum' => 'required|min:3',
        'desc' => 'required|min:3',
        'categoryid' => 'required',
        'image' => 'required|image|mimes:jpg,png',
    ];

    public function render()
    {
        return view('livewire.ablum-create', [
            'categories' => Category::latest()->get(),
        ]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeAblum()
    {
        $this->validate();
        if ($this->image) {
            $imgname =
                date('dd-mm-y') . '' . $this->image->getClientOriginalName();
        }
        Ablum::create([
            'name' => $this->ablum,
            'slug' => $this->desc,
            'user_id' => auth()->user()->id,
            'category_id' => $this->categoryid,
            'image' => $this->image
                ? $this->image->storeAs('public/ablums', $imgname)
                : null,
        ]);

        $this->alert('success', 'Ablum Create Successful', [
            'position' => 'bottom-end',
            'timer' => 6000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => '&times;',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);

        $this->resetForm();
    }
    public function resetForm()
    {
        $this->ablum = '';
        $this->categoryid = '';
        $this->desc = '';
        $this->image = '';
    }
}
