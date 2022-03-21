<div>
    <div class="mb-3">
        <select name="cd_familia_dinossauro" wire:model="cd_familia_dinossauro" class="rounded-md px-5 py-3 border border-lime-400 w-80 focus:ring-lime-500 focus:border-lime-500">
            <option value=''>Família de dinossauro</option>
            @foreach($familias as $familia)
                <option value={{ $familia->cd_familia_dinossauro }}>{{ $familia->no_familia_dinossauro }}</option>
            @endforeach
        </select>
    </div>
</div>
