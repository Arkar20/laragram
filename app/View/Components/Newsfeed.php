<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Newsfeed extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ablums;
    public function __construct($ablums)
    {
        //here goes the newsfeed ablum the user who are follows

        $this->ablums = $ablums;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.newsfeed');
    }
}
