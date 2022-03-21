<?php

namespace App\Http\Livewire;

use App\Models\TipoDinossauro;
use Livewire\Component;

class TiposDinossaurosDropdowns extends Component
{
    public $tipos;
    public $cd_tipo_dinossauro;

    public function render()
    {
        $this->tipos = TipoDinossauro::where('cd_tipo_dinossauro', '!=', '')->orderBy('no_tipo_dinossauro')->get();

        return view('livewire.tipos-dinossauros-dropdowns', ['tipos' => $this->tipos]);
    }
}
