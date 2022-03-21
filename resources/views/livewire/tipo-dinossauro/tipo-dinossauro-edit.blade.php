<div class="py-4">
    <x-slot name="header">
        Editar tipo
    </x-slot>

    @include('includes.message')

    <form action="" wire:submit.prevent="updateTipoDinossauro" class="p-10">
        <p>
            <label>Nome</label>
            <input type="text" name="no_tipo_dinossauro" class="rounded shadow border-t" wire:model="no_tipo_dinossauro">
            @error('no_tipo_dinossauro')
                <h5>{{ $message }}</h5>
            @enderror
        </p>
        <button type="submit" class="mt-5">Atualizar</button>
    </form>
</div>
