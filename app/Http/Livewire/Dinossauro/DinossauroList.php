<?php

namespace App\Http\Livewire\Dinossauro;

use App\Models\Dinossauro;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DinossauroList extends Component
{
    public $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        $dinossauros = Dinossauro::where('no_dinossauro', 'like', "%{$this->search}%")->paginate(5);

        return view('livewire.dinossauro.dinossauro-list', [
            'dinossauros' => $dinossauros
        ]);
    }

    public function remove($dinossauro)
    {
        $dino = Dinossauro::find($dinossauro);
        $dino->delete();

        Session::flash('msg_sucesso', 'Registro removido com sucesso!');
    }
}
