<?php

namespace App\Livewire\Licenses;

use Livewire\Component;
use App\Models\License;
use WireUi\Traits\Actions;

class CreateLicense extends Component
{
    use Actions;

    public License $license;

    protected $rules = [
        'license.status' => 'required',
        'license.ends_at' => 'required',
    ];

    public function mount(License $license)
    {
        $this->authorize('create', $license);

        $this->license = $license;
    }

    public function render()
    {
        return view('livewire.licenses.create');
    }

    public function submit()
    {
        $this->validate();

        $this->license->create();

        return redirect()->route('licenses.index');
    }
}
