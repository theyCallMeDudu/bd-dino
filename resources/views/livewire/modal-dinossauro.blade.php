@props(['trigger'])

<div
    class="fixed top-0 left-0 flex items-center w-full h-full bg-gray-900 bg-opacity-60"
    x-show="{{ $trigger }}"
    x-on:click.self="{{ $trigger }} = false"
    x-on:keydown.escape.window="{{ $trigger }} = false"
    x-cloak
>
    <div {{ $attributes->merge(['class' => 'p-8 m-auto bg-gray-200 shadow-2xl rounded-xl']) }}>
        {{ $dino->cd_dinossauro }}
    </div>
</div>
