<?php

namespace App\Http\Livewire\TipoDinossauro;

use Livewire\Component;
use App\Models\TipoDinossauro;

class TipoDinossauroCreate extends Component
{
    public $no_tipo_dinossauro;


    public function createTipoDinossauro()
    {
        $rules = [
            'no_tipo_dinossauro' => 'required'
        ];

        $feedback = [
            'no_tipo_dinossauro.required' => 'Informe um nome'
        ];

        $this->validate($rules, $feedback);

        TipoDinossauro::create([
            'no_tipo_dinossauro' => $this->no_tipo_dinossauro
        ]);

        session()->flash('message', 'Registro criado com sucesso!');

        $this->no_tipo_dinossauro = null;
    }

    public function render()
    {
        return view('livewire.tipo-dinossauro.tipo-dinossauro-create');
    }
}
