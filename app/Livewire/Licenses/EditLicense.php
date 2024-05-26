<?php

namespace App\Livewire\Licenses;

use Livewire\Component;
use App\Models\License;

class EditLicense extends Component
{
    public License $license;

    protected $rules = [
        'license.status' => 'required',
        'license.ends_at' => 'required',
    ];

    public function mount(License $license)
    {
        $this->authorize('update',  $license);

        $this->license = $license;
    }

    public function render()
    {
        return view('livewire.licenses.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->license->update();

        return redirect()->route('licenses.index');
    }
}
