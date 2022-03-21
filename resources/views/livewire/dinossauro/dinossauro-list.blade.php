<div>
    <x-slot name="header">
        Dinossauros
    </x-slot>

    @include('includes.message')

    <table>
        <thead>
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
                <tr>
                    <td>{{ $dino->cd_dinossauro }}</td>
                    <td>{{ $dino->no_dinossauro }}</td>
                    <td>{{ $dino->familia->no_familia_dinossauro }}</td>
                    <td>{{ $dino->tipo->no_tipo_dinossauro }}</td>
                    <td>{{ $dino->dt_inclusao }}</td>
                    <td>
                        <a href="{{ route('dinossauros.edit', $dino->cd_dinossauro) }}">Editar</a>
                        <a href="#" wire:click.prevent="remove({{$dino->cd_dinossauro}})">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $dinossauros->links() }}
</div>
