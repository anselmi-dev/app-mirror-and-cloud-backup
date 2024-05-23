<?php

namespace App\Livewire\Storage;

use Livewire\Component;
use App\Models\License;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Index extends Component
{
    public License $license;

    public string|null $previous;

    public string $current = '';

    public array|null $directories = [];

    public array|null $files = [];

    public function mount()
    {
        $this->current = $this->license->uuid;
    }

    public function render()
    {
        $this->directories = Storage::disk('public')->directories($this->current);

        $this->files = Storage::disk('public')->files($this->current);

        return view('livewire.storage.index');
    }

    public function setDirectory (string $directory)
    {
        if (Str::contains($directory, '/')) {

            $previous = str()->beforeLast($directory, '/');

            $this->previous = $previous;
        } else {
            $this->previous = null;
        }


        $this->current = $directory;
    }
}
