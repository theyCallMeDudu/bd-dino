<div class="py-4">
    <x-slot name="header">
        <p class="text-2xl font-bold text-yellow-900 underline">Visualizar dinossauro</p>
    </x-slot>

    @include('includes.message')

    <div class="mt-5 py-8 px-12 bg-white flex justify-center">
        <a
            class="bg-yellow-700 text-white rounded-lg py-2 px-2 hover:bg-yellow-800 float-left h-1/4 mr-2"
            href="{{ route('dinossauros.index') }}"
        >
            Voltar
        </a>
        <div
            class="flex flex-col p-24 bg-yellow-100 w-1/2 rounded-lg items-center"
        >
            <card class="w-72 rounded-lg border shadow-md flex flex-col p-5 bg-white text-yellow-900">

                    @if (!is_null($dinossauro->ft_dinossauro))
                    <img src="{{ asset('storage/' . $dinossauro->ft_dinossauro)  }}" alt="Foto do dinossauro">
                    @endif
                    <hr class="my-1">
                    <table>
                        <thead>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            <tr >
                                <td class="font-bold py-2">Nome</td>
                                <td>{{ $dinossauro->no_dinossauro }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold py-2">Família</td>
                                <td>{{ $dinossauro->familia->no_familia_dinossauro }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold py-2">Tipo</td>
                                <td>{{ $dinossauro->tipo->no_tipo_dinossauro }}</td>
                            </tr>
                        </tbody>
                    </table>

            </card>

        </div>
    </div>
</div>
