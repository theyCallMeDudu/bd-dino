<?php

namespace App\Http\Livewire;

use App\Models\FamiliaDinossauro;
use Livewire\Component;

class FamiliasDinossaurosDropdowns extends Component
{
    public $familias;
    public $cd_familia_dinossauro;

    public function render()
    {
        $this->familias = FamiliaDinossauro::where('cd_familia_dinossauro', '!=', '')->orderBy('no_familia_dinossauro')->get();

        return view('livewire.familias-dinossauros-dropdowns', ['familias' => $this->familias]);
    }
}
