<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentEdit extends Component
{
    public function edit()
    {
    }

    public function render()
    {
        return view('livewire.comment-edit');
    }
}
