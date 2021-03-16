<?php

namespace App\Http\Livewire;

use App\Models\Ablum;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AblumEdit extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $ablum;
    public $image;
    public $newimg;
    public $name;
    public $desc;
    public $categoryid;
    public $rules = [
        'name' => 'required|min:3',
        'desc' => 'required|min:3',
        'categoryid' => 'required',
        'newimg' => 'required',
    ];
    public function mount(Ablum $ablum)
    {
        $this->ablum = $ablum;
        $this->name = $ablum->name;
        $this->desc = $ablum->slug;
        $this->categoryid = $ablum->category_id;
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.ablum-edit', [
            'categories' => Category::latest()->get(),
        ]);
    }
    public function updateAblum()
    {
        $this->authorize('view', $this->ablum);

        if ($this->newimg) {
            $imgname =
                date('dd-mm-y') . '' . $this->newimg->getClientOriginalName();
        }

        $this->ablum->update([
            'name' => $this->name,
            'slug' => $this->desc,
            'user_id' => auth()->user()->id,
            'category_id' => $this->categoryid,
            'image' => $this->newimg
                ? $this->newimg->storeAs('public/ablums', $imgname)
                : $this->ablum->image,
        ]);
        $this->alert('success', 'Ablum Updated Successfuly', [
            'position' => 'bottom-end',
            'timer' => 4000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => '&times;',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);
    }
}
