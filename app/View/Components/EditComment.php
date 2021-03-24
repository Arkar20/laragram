<?php

namespace App\View\Components;

use App\Models\Comment;
use Illuminate\View\Component;

class EditComment extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.edit-comment');
    }
}
