<div class="py-4">
    <x-slot name="header">
        Novo tipo de dinossauro
    </x-slot>

    @include('includes.message')

    <form action="" wire:submit.prevent="createTipoDinossauro">
        <p>
            <label for="">Nome</label>
            <input type="text" name="no_tipo_dinossauro" class="rounded shadow border-t" wire:model="no_tipo_dinossauro">
            @error('no_tipo_dinossauro')
                <h5>{{ $message }}</h5>
            @enderror
        </p>
        <button type="submit">Salvar</button>
    </form>
</div>
