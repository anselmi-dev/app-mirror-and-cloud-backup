<?php

namespace App\Livewire\Licenses;

use Livewire\Component;
use App\Models\License;

class Show extends Component
{
    public License $license;

    public function mount ()
    {

    }

    public function render()
    {
        return view('livewire.licenses.show', [

        ]);
    }
}
