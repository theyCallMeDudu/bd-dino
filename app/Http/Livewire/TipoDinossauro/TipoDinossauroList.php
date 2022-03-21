<?php

namespace App\Http\Livewire\TipoDinossauro;

use Livewire\Component;
use App\Models\TipoDinossauro;

class TipoDinossauroList extends Component
{
    public function render()
    {
        $tipos_dinossauros = TipoDinossauro::paginate(5);

        return view('livewire.tipo-dinossauro.tipo-dinossauro-list', [
            'tipos_dinossauros' => $tipos_dinossauros
        ]);
    }

    public function remove($tipo_dinossauro)
    {
        $tipo = TipoDinossauro::find($tipo_dinossauro);
        $tipo->delete();

        session()->flash('message', 'Registro removido com sucesso!');
    }
}
