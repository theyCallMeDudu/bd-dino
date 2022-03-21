<?php

namespace App\Http\Livewire\Dinossauro;

use App\Models\Dinossauro;
use App\Models\FamiliaDinossauro;
use App\Models\TipoDinossauro;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class DinossauroCreate extends Component
{
    use WithFileUploads;

    public $no_dinossauro;
    public $cd_familia_dinossauro;
    public $cd_tipo_dinossauro;
    public $ft_dinossauro;

    public function createDinossauro()
    {
        $rules = [
            'no_dinossauro'         => 'required',
            'cd_tipo_dinossauro'    => 'required',
            'cd_familia_dinossauro' => 'required',
            'ft_dinossauro'         => 'image|nullable'
        ];

        $feedback = [
            'no_dinossauro.required'         => 'Informe um nome',
            'cd_familia_dinossauro.required' => 'Informe uma família',
            'cd_tipo_dinossauro.required'    => 'Informe um tipo',
            'ft_dinossauro.image'            => 'O arquivo precisa ser do tipo imagem'
        ];

        $this->validate($rules, $feedback);

        if ($this->ft_dinossauro) {
            $ft_dinossauro = $this->ft_dinossauro->store('dinossauros', 'public');
        }

        Dinossauro::create([
            'no_dinossauro'         => $this->no_dinossauro,
            'cd_familia_dinossauro' => $this->cd_familia_dinossauro,
            'cd_tipo_dinossauro'    => $this->cd_tipo_dinossauro,
            'dt_inclusao'           => Carbon::now(),
            'ft_dinossauro'         => $ft_dinossauro ?? null
        ]);

        Session::flash('msg_sucesso', 'Registro criado com sucesso!');

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
