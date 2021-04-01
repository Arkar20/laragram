<?php

namespace App\Http\Livewire;

use App\Models\Ablum;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentSection extends Component
{
    use AuthorizesRequests;
    public $ablum;
    public $comment;
    public $updatecmt;
    public $showeditbox = false;
    public $txtcomment;
    public $txtcommentupdate;
    protected $rules = [
        'txtcomment' => ['required', 'min:5', 'max:255'],
    ];
    protected $listeners = ['confirmed', 'cancelled'];

    public function mount($ablum)
    {
        $this->authorize('view', $ablum);
        $this->ablum = $ablum;
    }
    public function render()
    {
        return view('livewire.comment-section', [
            'comments' => $this->ablum->comments,
        ]);
    }

    public function addComment()
    {
        $this->validate();

        $datacmt = Comment::create([
            'comment' => $this->txtcomment,
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

        $this->txtcomment = '';
        $this->ablum = Ablum::find($datacmt->ablum_id);
    }
    public function delete(Comment $comment)
    {
        $this->comment = $comment->id;
        // dd($this->comment);
        $this->confirm('Do you love Livewire Alert?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Nope',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled',
        ]);
        $this->ablum = Ablum::find($this->ablum->id);
    }
    public function confirmed()
    {
        // Example code inside confirmed callback
        if ($this->comment) {
            $comment = Comment::find($this->comment);
            $comment->delete();
        }

        $this->alert('success', 'Comment Deleted');
        $this->ablum = Ablum::find($this->ablum->id);
    }

    public function cancelled()
    {
        // Example code inside cancelled callback

        $this->alert('info', 'Understood');
    }

    //edit
    public function edit(Comment $comment)
    {
        if ($this->updatecmt != $comment->id) {
            $this->showeditbox = true;
            $this->updatecmt = $comment->id;
        } else {
            $this->showeditbox = !$this->showeditbox;
            $this->updatecmt = $comment->id;
        }
        $this->txtcommentupdate = $comment->comment;
    }
    public function updateCmt()
    {
        $comment = Comment::find($this->updatecmt);
        $comment->update([
            'comment' => $this->txtcommentupdate,
        ]);
        $this->alert('success', 'Updated', [
            'position' => 'bottom-end',
            'timer' => 6000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => '&times;',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);
        $this->ablum = Ablum::find($this->ablum->id);
        $this->updatecmt = 0;
    }
}
