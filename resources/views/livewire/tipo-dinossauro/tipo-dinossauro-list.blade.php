<div>
    <x-slot name="header">
        Tipos
    </x-slot>

    @include('includes.message')

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Tipo</th>
                <th>Data inclusão</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipos_dinossauros as $tipo)
                <tr>
                    <td>{{ $tipo->cd_tipo_dinossauro }}</td>
                    <td>{{ $tipo->no_tipo_dinossauro }}</td>
                    <td>{{ $tipo->dt_inclusao }}</td>
                    <td>
                        <a href="{{ route('tipos-dinossauros.edit', $tipo->cd_tipo_dinossauro) }}">Editar</a>
                        <a href="#" wire:click.prevent="remove({{$tipo->cd_tipo_dinossauro}})">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tipos_dinossauros->links() }}
</div>
