<?php

namespace App\Http\Livewire\Dinossauro;

use App\Models\Dinossauro;
use Livewire\Component;

class DinossauroList extends Component
{
    public function render()
    {
        $dinossauros = Dinossauro::paginate(5);

        return view('livewire.dinossauro.dinossauro-list', [
            'dinossauros' => $dinossauros
        ]);
    }

    public function remove($dinossauro)
    {
        $dino = Dinossauro::find($dinossauro);
        $dino->delete();

        session()->flash('message', 'Registro removido com sucesso!');
    }
}
