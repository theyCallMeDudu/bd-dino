<?php

namespace App\Http\Livewire\TipoDinossauro;

use Livewire\Component;
use App\Models\TipoDinossauro;
use Illuminate\Support\Facades\Session;

class TipoDinossauroList extends Component
{
    public $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        $tipos_dinossauros = TipoDinossauro::where('no_tipo_dinossauro', 'like', "%{$this->search}%")->paginate(5);

        return view('livewire.tipo-dinossauro.tipo-dinossauro-list', [
            'tipos_dinossauros' => $tipos_dinossauros
        ]);
    }

    public function remove($tipo_dinossauro)
    {
        $tipo = TipoDinossauro::find($tipo_dinossauro);
        $tipo->delete();

        Session::flash('msg_sucesso', 'Registro removido com sucesso!');
    }
}
