<?php

namespace App\View\Components;

use App\Models\Image;
use Illuminate\View\Component;

class Gallary extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $photos;
    public function __construct($photos)
    {
        $this->photos = $photos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.gallary');
    }
}
