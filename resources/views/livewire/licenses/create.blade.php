<x-slot name="header">
    <div class="sm:flex sm:items-center w-full">
        <div class="sm:flex-auto flex-1">
            <h1 class="text-base lg:text-2xl font-semibold leading-6 text-gray-900">
                Nueva licencia
            </h1>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            {{-- <x-button primary href="{{ route('licenses.create') }}">
                Nueva
            </x-button> --}}
        </div>
    </div>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form wire:submit="submit">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <x-native-select
                                label="{{ __('Status') }}"
                                placeholder="{{ __('Status') }}"
                                label="{{ __('Status') }}"
                                placeholder="{{ __('Status') }}"
                                :options="[
                                    [
                                        'name' => __('status:active'),
                                        'id' => 'active'
                                    ],
                                    [
                                        'name' => __('status:pending'),
                                        'id' => 'pending'
                                    ],
                                    [
                                        'name' => __('status:cancelled'),
                                        'id' => 'cancelled'
                                    ]
                                ]"
                                option-label="name"
                                option-value="id"
                                wire:model.defer="license.status"
                            />
                        </div>
                        <div class="sm:col-span-3">
                            <x-datetime-picker
                                label="{{ __('Ends At') }}"
                                placeholder="{{ __('Ends At') }}"
                                wire:model.defer="license.ends_at"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full flex-1">
                <x-errors></x-errors>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <x-form.button icon="arrow-left" href="{{ route('licenses.index') }}" class="text-sm font-semibold leading-6 text-gray-900">
                    {{ __('Cancel') }}
                </x-form.button>
                <x-form.button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    {{ __('Save') }}
                </x-form.button>
            </div>
        </form>
    </div>
</div>
