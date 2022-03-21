<div>
    <div class="mb-3">
        <select name="cd_tipo_dinossauro" wire:model="cd_tipo_dinossauro" class="rounded-md px-5 py-3 border border-lime-400 w-80 focus:ring-lime-500 focus:border-lime-500">
            <option value=''>Tipo de dinossauro</option>
            @foreach($tipos as $tipo)
                <option value={{ $tipo->cd_tipo_dinossauro }}>{{ $tipo->no_tipo_dinossauro }}</option>
            @endforeach
        </select>
    </div>
</div>
