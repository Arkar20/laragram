<?php

namespace App\Http\Livewire;

use App\Models\Ablum;
use Livewire\Component;

class AblumShow extends Component
{
    public $ablum;
    protected $listeners = ['confirmed', 'cancelled'];
    public function render()
    {
        $ablums = Ablum::where('user_id', auth()->user()->id)
            ->with('category')
            ->get();

        return view('livewire.ablum-show', compact('ablums'));
    }

    public function confirmed()
    {
        // Example code inside confirmed callback

        $this->ablum->delete();
        $this->alert('success', 'Thanks! consider giving it a star on github.');
    }

    public function cancelled()
    {
        // Example code inside cancelled callback

        $this->alert('info', 'Understood');
    }
    public function deleteAblum(Ablum $ablum)
    {
        $this->ablum = $ablum;
        $this->confirm('Do you love Livewire Alert?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Nope',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled',
        ]);
    }
}
