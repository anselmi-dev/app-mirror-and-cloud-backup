<x-slot name="header">
    <div class="sm:flex sm:items-center w-full">
        <div class="sm:flex-auto flex-1">
            <h1 class="text-base lg:text-2xl font-semibold leading-6 text-gray-900">
                {{ $license->uuid }}
            </h1>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <x-button primary href="{{ route('licenses.index') }}">
                Volver
            </x-button>
        </div>
    </div>
</x-slot>

<div class="py-5">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <livewire:storage.index :license="$license"></livewire:storage.index>
    </div>
</div>
