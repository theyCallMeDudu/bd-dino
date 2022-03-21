<?php

namespace App\Http\Livewire\FamiliaDinossauro;

use App\Models\FamiliaDinossauro;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class FamiliaDinossauroList extends Component
{
    public $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        $familias_dinossauros = FamiliaDinossauro::where('no_familia_dinossauro', 'like', "%{$this->search}%")->get();

        return view('livewire.familia-dinossauro.familia-dinossauro-list', [
            'familias_dinossauros' => $familias_dinossauros
        ]);
    }

    public function remove($familia_dinossauro)
    {
        $familia = FamiliaDinossauro::find($familia_dinossauro);
        $familia->delete();

        Session::flash('msg_sucesso', 'Registro removido com sucesso!');
    }
}
