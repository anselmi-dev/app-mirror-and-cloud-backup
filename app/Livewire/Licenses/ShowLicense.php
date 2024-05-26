<?php

namespace App\Livewire\Licenses;

use Livewire\Component;
use App\Models\License;

class ShowLicense extends Component
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
