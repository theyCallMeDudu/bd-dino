<?php

namespace App\Http\Livewire\TipoDinossauro;

use App\Models\TipoDinossauro;
use Livewire\Component;

class TipoDinossauroEdit extends Component
{
    public $cd_tipo_dinossauro;
    public $no_tipo_dinossauro;

    public function mount(TipoDinossauro $tipo_dinossauro)
    {
        $this->cd_tipo_dinossauro = $tipo_dinossauro->cd_tipo_dinossauro;
        $this->no_tipo_dinossauro = $tipo_dinossauro->no_tipo_dinossauro;
    }

    public function updateTipoDinossauro()
    {
        $rules = [
            'no_tipo_dinossauro' => 'required'
        ];

        $feedback = [
            'no_tipo_dinossauro.required' => 'Informe um nome'
        ];

        $this->validate($rules, $feedback);

        (TipoDinossauro::find($this->cd_tipo_dinossauro))->update([
            'no_tipo_dinossauro' => $this->no_tipo_dinossauro
        ]);

        session()->flash('message', 'Registro atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.tipo-dinossauro.tipo-dinossauro-edit');
    }
}
