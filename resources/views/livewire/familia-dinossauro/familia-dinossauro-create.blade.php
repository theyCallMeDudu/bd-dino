<div class="py-4">
    <x-slot name="header">
        <p class="text-2xl font-bold text-yellow-900 underline">Nova família</p>
    </x-slot>

    @include('includes.message')
    <div class="mt-5 py-8 px-12 bg-white flex justify-center">
        <a
            class="bg-yellow-700 text-white rounded-lg py-2 px-2 hover:bg-yellow-800 float-left h-1/4 mr-2"
            href="{{ route('familias-dinossauros.index') }}"
        >
            Voltar
        </a>
            <form
                action=""
                wire:submit.prevent="createFamiliaDinossauro"
                class="flex flex-col p-24 bg-yellow-100 w-1/2 rounded-lg"
            >
                <label class="text-yellow-900 font-bold">Nome</label>
                <input
                    type="text"
                    name="no_familia_dinossauro"
                    wire:model="no_familia_dinossauro"
                    class="rounded-lg shadow border-t w-full mb-5 focus:ring-lime-500 focus:border-lime-500"
                    placeholder="Ex.: Saurópodes"
                    autocomplete="off"
                >
                @error('no_familia_dinossauro')
                    <h5 class="text-red-600">{{ $message }}</h5>
                @enderror
                <button
                    type="submit"
                    class="rounded-lg bg-lime-600 hover:bg-lime-800 text-white py-2 px-2 w-full mt-2"
                >
                    Salvar
                </button>
            </form>
    </div>
</div>
