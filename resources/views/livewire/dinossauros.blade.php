<div
    class="p-10 bg-white border-b border-gray-200"
    x-data="{
        showNovoDinossauro: @entangle('showNovoDinossauro'),
        showVerDinossauro: @entangle('showVerDinossauro'),
        showSuccess: @entangle('showSuccess'),
    }"
>
    <p class="p-9 mb-6 text-2xl font-bold text-yellow-900 underline">Dinossauros</p>
    {{-- <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div> --}}
    <div class="px-8">
        <x-button
            class="text-white bg-lime-700 hover:bg-lime-800"
            title="Novo"
            x-on:click="showNovoDinossauro = true"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
        </x-button>

        <!-- Input de busca -->
        <x-input
            type="text"
            class="float-right w-1/3 pl-8 mb-4 border border-yellow-700 rounded-lg"
            placeholder="Buscar"
            wire:model='search'
        >
        </x-input>
        <!-- Input de busca -->

        @if ($dinossauros->isEmpty())
            <div class="flex w-full p-5 bg-red-100 rounded-lg">
                <p class="text-red-400">Nenhum registro encontrado.</p>
            </div>
        @else
            <table class="w-full">
                <thead class="text-lime-700 border-b-2 border-gray-300">
                    <tr>
                        <th class="px-6 py-3 text-left">Nome</th>
                        <th class="px-6 py-3 text-left">Família</th>
                        <th class="px-6 py-3 text-left">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dinossauros as $dino)
                        <tr class="text-sm text-indigo-900 border-b border-gray-400">
                            <td class="px-6 py-4">
                                {{ $dino->no_dinossauro }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $dino->familia->no_familia_dinossauro }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $dino->tipo->no_tipo_dinossauro }}
                            </td>
                            <td class="px-6 py-4">
                                <x-button
                                    class="text-red-500 border border-red-500 bg-red-50 hover:bg-red-100"
                                    wire:click='delete({{ $dino->cd_dinossauro }})'
                                >
                                    Delete
                                </x-button>
                                <x-button
                                    class="text-gray-500 border border-gray-500 bg-gray-50 hover:bg-gray-100"
                                    {{-- wire:click='show({{ $dino->cd_dinossauro }})' --}}
                                    title="Detalhes dinossauro"
                                    x-on:click="showVerDinossauro = true"
                                >
                                    Ver
                                </x-button>

                                <!-- Modal visualizar dinossauro -->
                                <x-modal
                                    class="bg-yellow-800"
                                    trigger="showVerDinossauro"
                                >
                                    <p class="text-5xl font-extrabold text-center text-white">
                                        Detalhes dinossauro
                                    </p>
                                    <form class="flex flex-col items-center p-24">
                                        <!-- Input de nome do dinossauro -->
                                        <x-input
                                            class="px-5 py-3 border border-lime-400 w-80 mb-3 focus:ring-lime-500 focus:border-lime-500"
                                            type="text"
                                            name="no_dinossauro"
                                            disabled
                                        >
                                            {{ $dino->no_dinossauro }}
                                        </x-input>
                                        <!-- Input de nome do dinossauro -->

                                        <!-- Input de familia do dinossauro -->
                                        <x-input
                                            class="px-5 py-3 border border-lime-400 w-80 mb-3 focus:ring-lime-500 focus:border-lime-500"
                                            type="text"
                                            name="cd_familia_dinossauro"
                                            disabled
                                        >
                                            {{ $dino->familia->no_familia_dinossauro }}
                                        </x-input>
                                        <!-- Input de familia do dinossauro -->

                                        <!-- Input de tipo do dinossauro -->
                                        <x-input
                                            class="px-5 py-3 border border-lime-400 w-80 mb-3 focus:ring-lime-500 focus:border-lime-500"
                                            type="text"
                                            name="cd_tipo_dinossauro"
                                            disabled
                                        >
                                            {{ $dino->tipo->no_tipo_dinossauro }}
                                        </x-input>
                                        <!-- Input de tipo do dinossauro -->
                                    </form>
                                </x-modal>
                                <!-- Modal visualizar dinossauro -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Modais -->

        <!-- Modal novo dinossauro -->
        <x-modal class="bg-yellow-800" trigger="showNovoDinossauro">
            <p class="text-5xl font-extrabold text-center text-white">
                Novo dinossauro
            </p>
            <form
                class="flex flex-col items-center p-24"
                wire:submit.prevent="saveDinossauro"
            >
                <!-- Input de nome do dinossauro -->
                <x-input
                    class="px-5 py-3 border border-lime-400 w-80 mb-3 focus:ring-lime-500 focus:border-lime-500"
                    type="text"
                    name="no_dinossauro"
                    placeholder="Ex.: Pterodáctilo"
                    wire:model.defer="no_dinossauro"
                    required
                >
                </x-input>
                <span class="text-xs text-red-200">
                    {{ $errors->has('no_dinossauro') }}
                </span>
                <!-- Input de nome do dinossauro -->

                <!-- Select de familia de dinossauro -->
                <div class="mt-2 flex justify-between">
                    <div class="flex-1">
                        <select
                            name="cd_familia_dinossauro"
                            wire:model="cd_familia_dinossauro"
                            class=""
                        >
                            <option value="">Selecione uma família</option>
                            @foreach ($familias as $familia)
                                <option value="{{ $familia->cd_familia_dinossauro }}">{{ $familia->no_familia_dinossauro }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Select de familia de dinossauro -->

                <!-- Select de tipo de dinossauro -->
                <div class="mt-2 flex justify-between">
                    <div class="flex-1">
                        <select
                            name="cd_tipo_dinossauro"
                            wire:model="cd_tipo_dinossauro"
                            class=""
                        >
                            <option value="">Selecione um tipo</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->cd_tipo_dinossauro }}">{{ $tipo->no_tipo_dinossauro }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Select de tipo de dinossauro -->



                <x-button class="justify-center px-5 py-3 mt-5 bg-lime-600 w-80 hover:bg-lime-700">
                    <span class="animate-spin" wire:loading wire:target='saveDinossauro'>&#9696;</span>
                    <span wire:loading.remove wire:target='saveDinossauro'>Salvar</span>
                </x-button>
            </form>
        </x-modal>
        <!-- Modal novo dinossauro -->



    </div>
</div>
