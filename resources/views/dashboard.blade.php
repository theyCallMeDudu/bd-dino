<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex items-center">
        <div class="max-w-7xl mx-auto">
                <div class="p-8 inline-grid gap-4 grid-cols-3 bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                    <x-card
                        title="Famílias"
                        url="{{ route('familias-dinossauros.index') }}"
                        urlImg="{{url('/img/banner-familia.jpg')}}"

                    >
                    </x-card>

                    <x-card
                        title="Tipos"
                        url="{{ route('tipos-dinossauros.index') }}"
                        urlImg="{{url('/img/banner-tipo.jpg')}}"
                    >
                    </x-card>

                    <x-card
                        title="Dinossauros"
                        url="{{ route('dinossauros.index') }}"
                        urlImg="{{url('/img/banner-dinossauro.jpg')}}"
                    >
                    </x-card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
