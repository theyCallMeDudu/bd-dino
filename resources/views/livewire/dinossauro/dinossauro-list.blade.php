<div>
    <x-slot name="header">
        <p class="text-2xl font-bold text-yellow-900 underline">Dinossauros</p>
    </x-slot>

    <div class="mt-5 py-8 px-16 bg-white">
        @include('includes.message')
        <a
            class="bg-lime-600 text-white rounded-lg py-2 px-2 hover:bg-lime-800"
            href="{{ route('dinossauros.create') }}"
        >
            Novo
        </a>
        <x-input
            type="text"
            class="float-right w-1/3 pl-8 mb-4 border border-yellow-700 rounded-lg focus:ring-lime-500 focus:border-lime-500"
            placeholder="Buscar"
            wire:model='search'
        >
        </x-input>

            @if ($dinossauros->isEmpty())
                <div class="flex w-full p-5 bg-red-100 rounded-lg">
                    <p class="text-red-400">Nenhum registro encontrado.</p>
                </div>
            @else
                <table class="w-full text-center bg-yellow-100 rounded-lg">
                    <thead class="border-b-2 border-yellow-900 text-yellow-900">
                        <tr>
                            <th>Código</th>
                            <th>Dinossauro</th>
                            <th>Família</th>
                            <th>Tipo</th>
                            <th>Data inclusão</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dinossauros as $dino)
                            <tr class="text-sm text-yellow-900 border-b border-yellow-900">
                                <td class="px-6 py-4">{{ $dino->cd_dinossauro }}</td>
                                <td class="px-6 py-4">{{ $dino->no_dinossauro }}</td>
                                <td class="px-6 py-4">{{ $dino->familia->no_familia_dinossauro }}</td>
                                <td class="px-6 py-4">{{ $dino->tipo->no_tipo_dinossauro }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dino->dt_inclusao)->format('d/m/Y') }}</td>
                                <td class="px-6 py-4">
                                    <a
                                        class="bg-indigo-600 py-2 px-2 text-white rounded-lg mr-2 hover:bg-indigo-800"
                                        href="{{ route('dinossauros.edit', $dino->cd_dinossauro) }}"
                                    >
                                        Editar
                                    </a>
                                    <a
                                        class="bg-red-600 py-2 px-2 text-white rounded-lg hover:bg-red-800"
                                        href="#" wire:click.prevent="remove({{$dino->cd_dinossauro}})"
                                    >
                                        Remover
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

    {{ $dinossauros->links() }}
</div>
