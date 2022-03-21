<div class="py-4">
    <x-slot name="header">
        Novo dinossauro
    </x-slot>

    @include('includes.message')

    <form action="" wire:submit.prevent="createDinossauro" class="p-10">
        <p>
            <label>Nome</label>
            <input type="text" name="no_dinossauro" class="rounded shadow border-t" wire:model="no_dinossauro">
            @error('no_dinossauro')
                <h5>{{ $message }}</h5>
            @enderror
        </p>

        <p>
            <label>Família</label>
            <select name="cd_familia_dinossauro" wire:model="cd_familia_dinossauro">
                <option value="">Selecione</option>
                @foreach ($familias as $familia)
                    <option value="{{ $familia->cd_familia_dinossauro }}">{{ $familia->no_familia_dinossauro }}</option>
                @endforeach
            </select>
            @error('cd_familia_dinossauro')
                <h5>{{ $message }}</h5>
            @enderror
        </p>

        <p>
            <label>Tipo</label>
            <select name="cd_tipo_dinossauro" wire:model="cd_tipo_dinossauro">
                <option value="">Selecione</option>
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->cd_tipo_dinossauro }}">{{ $tipo->no_tipo_dinossauro }}</option>
                @endforeach
            </select>
            @error('cd_tipo_dinossauro')
                <h5>{{ $message }}</h5>
            @enderror
        </p>
        <button type="submit" class="mt-5">Salvar</button>
    </form>
</div>
