<?php

namespace App\Http\Livewire\FamiliaDinossauro;

use App\Models\FamiliaDinossauro;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class FamiliaDinossauroCreate extends Component
{
    public $no_familia_dinossauro;


    public function createFamiliaDinossauro()
    {
        $rules = [
            'no_familia_dinossauro' => 'required'
        ];

        $feedback = [
            'no_familia_dinossauro.required' => 'Informe um nome'
        ];

        $this->validate($rules, $feedback);

        FamiliaDinossauro::create([
            'no_familia_dinossauro' => $this->no_familia_dinossauro
        ]);

        Session::flash('msg_sucesso', 'Registro criado com sucesso!');

        $this->no_familia_dinossauro = null;
    }

    public function render()
    {
        return view('livewire.familia-dinossauro.familia-dinossauro-create');
    }
}
