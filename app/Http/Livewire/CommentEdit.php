<?php

namespace App\Http\Livewire;

use App\Models\Ablum;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentEdit extends Component
{
    public $comment;

    public function mount($comment)
    {
        $this->comment = $comment;
    }
    // use AuthorizesRequests;
    // public Ablum $ablum;
    // public Comment $comment;
    // public $txtupdatecmt;
    // public $textbox = false;
    // public $commentshow = true;

    // public function edit()
    // {
    //     $this->textbox = !$this->textbox;
    //     $this->txtupdatecmt = $this->comment->comment;
    // }
    // public function updateCmt()
    // {
    //     // dd($this->txtupdatecmt);
    //     $this->authorize('view', $this->comment);

    //     $this->comment->update([
    //         'comment' => $this->txtupdatecmt,
    //     ]);
    //     $this->alertMessage('success', 'Comment Updated');
    //     $this->textbox = !$this->textbox;
    // }
    // public function delete()
    // {
    //     $this->comment->delete();

    //     $this->alertMessage('error', 'Comment Deleted');
    //     $this->commentshow = false;
    // }
    public function render()
    {
        return view('livewire.comment-edit');
    }
    // public function alertMessage($type, $message)
    // {
    //     $this->alert($type, $message, [
    //         'position' => 'bottom-end',
    //         'timer' => 6000,
    //         'toast' => true,
    //         'text' => '',
    //         'confirmButtonText' => 'Ok',
    //         'cancelButtonText' => '&times;',
    //         'showCancelButton' => true,
    //         'showConfirmButton' => false,
    //     ]);
    // }
}
