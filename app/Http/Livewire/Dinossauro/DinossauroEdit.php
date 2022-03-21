<?php

namespace App\Http\Livewire\Dinossauro;

use App\Models\Dinossauro;
use App\Models\FamiliaDinossauro;
use App\Models\TipoDinossauro;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DinossauroEdit extends Component
{
    public $cd_dinossauro;
    public $no_dinossauro;
    public $cd_familia_dinossauro;
    public $cd_tipo_dinossauro;

    public function mount(Dinossauro $dinossauro)
    {
        $this->cd_dinossauro         = $dinossauro->cd_dinossauro;
        $this->no_dinossauro         = $dinossauro->no_dinossauro;
        $this->cd_familia_dinossauro = $dinossauro->cd_familia_dinossauro;
        $this->cd_tipo_dinossauro    = $dinossauro->cd_tipo_dinossauro;
    }

    public function updateDinossauro()
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

        (Dinossauro::find($this->cd_dinossauro))->update([
            'no_dinossauro'         => $this->no_dinossauro,
            'cd_familia_dinossauro' => $this->cd_familia_dinossauro,
            'cd_tipo_dinossauro'    => $this->cd_tipo_dinossauro
        ]);

        Session::flash('msg_sucesso', 'Registro atualizado com sucesso!');
    }

    public function render()
    {
        $familias = FamiliaDinossauro::all();
        $tipos    = TipoDinossauro::all();

        return view('livewire.dinossauro.dinossauro-edit', [
            'familias' => $familias,
            'tipos'    => $tipos
        ]);
    }
}
