<?php

namespace App\Http\Livewire;

use App\Models\Ablum;
use App\Models\Comment;
use Livewire\Component;

class CommentCreate extends Component
{
    public $comment;
    public Ablum $ablum;
    public $currentComment;
    protected $rules = [
        'txtcomment' => ['required', 'min:5', 'max:255'],
    ];

    public function updated($attributes)
    {
        $this->validateOnly($attributes);
    }
    public function addComment()
    {
        $this->validate();

        $this->currentComment = Comment::create([
            'comment' => $this->comment,
            'ablum_id' => $this->ablum->id,
            'user_id' => auth()->user()->id,
        ]);

        $this->alert('success', 'Commented', [
            'position' => 'bottom-end',
            'timer' => 6000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => '&times;',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);

        $this->comment = '';
        $this->ablum = Ablum::find($this->ablum->id);
    }

    public function render()
    {
        return view('livewire.comment-create');
    }
}
