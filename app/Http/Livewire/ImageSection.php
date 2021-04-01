<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Image;
use Livewire\Component;
use App\Support\Collection;
use Livewire\WithPagination;

class ImageSection extends Component
{
    use WithPagination;
    public User $user;
    protected $queryString = [];
    public function render()
    {
        $items = $this->user->images;
        return view('livewire.image-section', [
            'images' => (new Collection($items))->paginate(6),
        ]);
    }
}
