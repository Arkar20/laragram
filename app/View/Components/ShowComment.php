<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShowComment extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ablum;
    public function __construct($ablum)
    {
        $this->ablum = $ablum;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.show-comment');
    }
}
