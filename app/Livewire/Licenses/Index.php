<?php

namespace App\Livewire\Licenses;

use Livewire\Component;
use App\Models\License;

class Index extends Component
{
    public function __construct()
    {
        $this->authorize('viewAny', License::class);
    }

    public function render()
    {
        return view('livewire.licenses.index', [
            'licenses' => License::orderBy('id')->paginate(15)
        ]);
    }
}
