<?php

namespace App\Http\Livewire;

use App\Models\Ablum;
use App\Models\React;
use Livewire\Component;

use function GuzzleHttp\Promise\each;

class ReactSection extends Component
{
    public $ablum;
    public $userisreact = false;
    public $reacts;
    public function mount($ablum)
    {
        $this->ablum = $ablum;
        $this->reacts = $this->ablum->reacts;
        foreach ($this->reacts as $react) {
            if ($react->user->is(auth()->user())) {
                return $this->userisreact = true;
            }
        }
    }
    public function react()
    {
        // $react = React::where('user_id', auth()->user()->id)
        //     ->where('ablum_id', $this->ablum->id)
        //     ->get();
        // if ($react) {
        //     // dd($react);
        //     $react->update(['react' => 0]);
        // } else {
        //     React::create([
        //         'user_id' => auth()->user()->id,
        //         'ablum_id' => $this->ablum->id,
        //         'react' => 1,
        //     ]);
        // }

        dd($this->ablum);
    }
    public function render()
    {
        return view('livewire.react-section');
    }
}
