<?php

namespace App\Http\Livewire\FamiliaDinossauro;

use App\Models\FamiliaDinossauro;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class FamiliaDinossauroEdit extends Component
{
    public $cd_familia_dinossauro;
    public $no_familia_dinossauro;

    public function mount(FamiliaDinossauro $familia_dinossauro)
    {
        $this->cd_familia_dinossauro = $familia_dinossauro->cd_familia_dinossauro;
        $this->no_familia_dinossauro = $familia_dinossauro->no_familia_dinossauro;
    }

    public function updateFamiliaDinossauro()
    {
        $rules = [
            'no_familia_dinossauro' => 'required'
        ];

        $feedback = [
            'no_familia_dinossauro.required' => 'Informe um nome'
        ];

        $this->validate($rules, $feedback);

        (FamiliaDinossauro::find($this->cd_familia_dinossauro))->update([
            'no_familia_dinossauro' => $this->no_familia_dinossauro
        ]);

        Session::flash('msg_sucesso', 'Registro atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.familia-dinossauro.familia-dinossauro-edit');
    }
}
