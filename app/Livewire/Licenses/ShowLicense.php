<?php

namespace App\Livewire\Licenses;

use Livewire\Component;
use App\Models\License;
use WireUi\Traits\Actions;

class ShowLicense extends Component
{
    use Actions;

    public License $license;

    public function mount (License $license)
    {
        $this->license = $license;
    }

    public function render()
    {
        return view('livewire.licenses.show', [

        ]);
    }
}
