<div class="w-fulk">

    @php
        $dir = str()->afterLast($previous, '/');
    @endphp

    <ul class="flex items-center gap-2 mb-4 pb-4 border-b-2">
        <li>
            <x-icon name="home" class="w-5"></x-icon>
        </li>
        @if ($previous)
            <li>
                <button type="button" wire:click="setDirectory('{{ $previous }}')">
                    <span class="flex items-center">
                        <x-icon name="arrow-narrow-left" class="w-3"></x-icon>
                        Subir directorio
                    </span>
                </button>
            </li>
        @endif
    </ul>

    <ul role="list" class="divide-y divide-gray-100">
        @forelse ($directories as $item)
            <li class="flex items-center justify-between gap-x-6 py-1">
                <div class="min-w-0">
                    <div class="flex items-start gap-x-3">
                        <x-icon name="folder-open" class="w-5"></x-icon>
                        <p class="text-blue underline | cursor-pointer" wire:click="setDirectory('{{ $item }}')">
                            {{ Str::replace($license->uuid, '', $item) }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-none items-center gap-x-4">
                    <div class="relative flex-none">
                        <button type="button" class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900"
                            id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open options</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </li>
        @empty
            <li class="flex items-center justify-between gap-x-6 py-1">
                El usuario no ha seleccionado ningún directorio para respaldar aún.
            </li>
        @endforelse

        @foreach ($files as $item)
            <li class="flex items-center justify-between gap-x-6 py-1">
                <div class="min-w-0">
                    <div class="flex items-start gap-x-3">
                        <x-icon name="document-text" class="w-5"></x-icon>
                        <p class="">
                            {{ Str::replace($license->uuid . '/', '', $item) }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-none items-center gap-x-4">
                    <div class="relative flex-none">
                        <button type="button" class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900"
                            id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open options</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
