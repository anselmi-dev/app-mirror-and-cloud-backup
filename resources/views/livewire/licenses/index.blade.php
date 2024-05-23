<div class="py-5">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex items-center w-full">
            <div class="sm:flex-auto flex-1">
                <h1 class="text-base lg:text-2xl font-semibold leading-6 text-gray-900">
                    Licencias
                </h1>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <x-button primary wire:click="generate" icon="plus">
                {{-- <x-button primary href="{{ route('licenses.create') }}"> --}}
                    Nueva
                </x-button>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-full">
            <div class="px-4 sm:px-6 lg:px-8 w-full">
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 w-full">
                        <div class="inline-block min-w-full w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300 w-full">
                                <thead>
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-0  | w-0">
                                            ID</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Licencia
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Estado
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-0">
                                            Creado el
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-0  | w-0">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @forelse ($licenses as $license)
                                        <tr class="divide-x divide-gray-200">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0 | w-0">
                                                {{ $license->id }}
                                            </td>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">
                                                {{ $license->uuid }}
                                            </td>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">
                                                {{ __('status:'.$license->status) }}
                                            </td>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0">
                                                {{ optional($license->created_at)->format('Y-m-d') }}
                                            </td>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0 | w-0">
                                                <x-form.button primary href="{{ route('licenses.show', ['license' => $license]) }}" icon="search"/>
                                                {{-- <x-form.button dark href="{{ route('licenses.edit', ['license' => $license]) }}" icon="pencil"/> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="divide-x divide-gray-200">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-0 | w-0 text-center " colspan="5">
                                                Sin registros
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $licenses->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
