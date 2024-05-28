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

    protected $storage;

    public function mount()
    {
        $this->current = '/';
    }

    public function render()
    {
        // Obtener la configuración actual del disco 's3'
        $s3Config = config('filesystems.disks.s3');

        // Modificar el nombre del bucket
        $s3Config['bucket'] = $this->license->uuid;

        // Reconfigurar el disco 's3' con el nuevo bucket
        config(['filesystems.disks.s3' => $s3Config]);

        $this->storage = Storage::disk('s3');

        $this->directories = $this->storage->directories($this->current);

        $this->files = $this->storage->files($this->current);

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
