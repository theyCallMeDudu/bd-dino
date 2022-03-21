<?php

namespace App\Http\Livewire\Dinossauro;

use App\Models\Dinossauro;
use App\Models\FamiliaDinossauro;
use App\Models\TipoDinossauro;
use Livewire\Component;

class DinossauroCreate extends Component
{
    public $no_dinossauro;
    public $cd_familia_dinossauro;
    public $cd_tipo_dinossauro;


    public function createDinossauro()
    {
        $rules = [
            'no_dinossauro'        => 'required',
            'cd_tipo_dinossauro'   => 'required',
            'cd_familia_dinossauro' => 'required'
        ];

        $feedback = [
            'no_dinossauro.required'         => 'Informe um nome',
            'cd_familia_dinossauro.required' => 'Informe uma família',
            'cd_tipo_dinossauro.required'    => 'Informe um tipo',
        ];

        $this->validate($rules, $feedback);

        Dinossauro::create([
            'no_dinossauro'         => $this->no_dinossauro,
            'cd_familia_dinossauro' => $this->cd_familia_dinossauro,
            'cd_tipo_dinossauro'    => $this->cd_tipo_dinossauro
        ]);

        session()->flash('message', 'Registro criado com sucesso!');

        $this->no_dinossauro         = null;
        $this->cd_familia_dinossauro = null;
        $this->cd_tipo_dinossauro    = null;
    }

    public function render()
    {
        $familias = FamiliaDinossauro::all();
        $tipos    = TipoDinossauro::all();

        return view('livewire.dinossauro.dinossauro-create', [
            'familias' => $familias,
            'tipos'    => $tipos
        ]);
    }
}
