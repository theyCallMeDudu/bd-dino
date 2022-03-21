<div
    class="p-6 bg-white border-b border-gray-200"
    x-data="{
        showNovoTipo: @entangle('showNovoTipo'),
        showSuccess: @entangle('showSuccess'),
    }"
>
    <p class="p-9 mb-6 text-2xl font-bold text-yellow-900 underline">Tipos</p>

    <div class="px-8">
        <x-button
            class="text-white bg-lime-700 hover:bg-lime-800"
            title="Novo"
            x-on:click="showNovoTipo = true"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
        </x-button>

        <x-modal class="bg-yellow-800" trigger="showNovoTipo">
            <p class="text-5xl font-extrabold text-center text-white">
                Novo tipo de dinossauro
            </p>
            <form
                class="flex flex-col items-center p-24"
                wire:submit.prevent="saveTipoDinossauro"
            >
            <x-input
                class="px-5 py-3 border border-lime-400 w-80"
                type="text"
                name="no_tipo_dinossauro"
                placeholder="Ex.: Onívoro"
                wire:model.defer="no_tipo_dinossauro"
                required
            >
            </x-input>

            <span class="text-xs text-gray-100">
                {{ $errors->has('no_tipo_dinossauro') }}
            </span>

            <x-button class="justify-center px-5 py-3 mt-5 bg-lime-600 w-80 hover:bg-lime-700">
                <span class="animate-spin" wire:loading wire:target='saveTipoDinossauro'>&#9696;</span>
                <span wire:loading.remove wire:target='saveTipoDinossauro'>Salvar</span>
            </x-button>
        </form>
        </x-modal>

        <x-input
            type="text"
            class="float-right w-1/3 pl-8 mb-4 border border-yellow-700 rounded-lg"
            placeholder="Buscar"
            wire:model='search'
        >
        </x-input>

        @if ($tipos->isEmpty())
            <div class="flex w-full p-5 bg-red-100 rounded-lg">
                <p class="text-red-400">Nenhum registro encontrado.</p>
            </div>
        @else
            <table class="w-full">
                <thead class="text-lime-700 border-b-2 border-gray-300">
                    <tr>
                        <th class="px-6 py-3 text-left">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipos as $tipo)
                        <tr class="text-sm text-indigo-900 border-b border-gray-400">
                            <td class="px-6 py-4">
                                {{ $tipo->no_tipo_dinossauro }}
                            </td>
                            <td class="px-6 py-4">
                                <x-button
                                    class="text-indigo-500 border border-indigo-500 bg-indigo-50 hover:bg-indigo-100"
                                    title="Editar"
                                    wire:click='delete({{ $tipo->cd_tipo_dinossauro }})'
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </x-button>
                                <x-button
                                    class="text-red-500 border border-red-500 bg-red-50 hover:bg-red-100"
                                    title="Deletar"
                                    wire:click='delete({{ $tipo->cd_tipo_dinossauro }})'
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
