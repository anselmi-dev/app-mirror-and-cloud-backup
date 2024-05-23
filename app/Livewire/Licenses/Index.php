<?php

namespace App\Livewire\Licenses;

use Livewire\Component;
use App\Models\License;
use Illuminate\Support\Facades\Gate;
class Index extends Component
{
    public function render()
    {
        $this->authorize('viewAny', License::class);

        return view('livewire.licenses.index', [
            'licenses' => License::orderBy('id')->paginate(15)
        ]);
    }

    public function generate ()
    {
        License::create([
        ]);

        return redirect()->route('licenses.index');
    }
}
