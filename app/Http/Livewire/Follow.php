<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Follow extends Component
{
    public User $user;

    public function follow()
    {
        $currentuser = auth()->user();
        // $currentuser->follow($this->user->id);
        if ($currentuser->isFollow($this->user->id)) {
            $currentuser->unfollow($this->user->id);
            $this->alertMessage(
                'error',
                'You unFollowed ' . '' . $this->user->name
            );
        } else {
            $currentuser->follow($this->user->id);
            $this->alertMessage(
                'success',
                'You Followed ' . '' . $this->user->name
            );
        }
    }

    public function alertMessage($type, $message)
    {
        $this->alert($type, $message, [
            'position' => 'bottom-end',
            'timer' => 6000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => '&times;',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);
    }
    public function render()
    {
        return view('livewire.follow');
    }
}
