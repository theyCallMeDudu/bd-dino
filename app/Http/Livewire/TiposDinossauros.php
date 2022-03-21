<?php

namespace App\Http\Livewire;

use App\Models\TipoDinossauro;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiposDinossauros extends Component
{
    public $no_tipo_dinossauro;
    public $showNovoTipo  = false;
    public $showSuccess   = false;
    public $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    protected $rules = [
        'no_tipo_dinossauro' => 'required',
    ];

    public function mount(Request $request)
    {
        if ($request->has('verified') && $request->verified == 1) {
            $this->showSuccess = true;
        }
    }

    public function render()
    {
        $tipos = TipoDinossauro::where('no_tipo_dinossauro', 'like', "%{$this->search}%")->get();
        return view('livewire.tipos-dinossauros', [
            'tipos' => $tipos
        ]);
    }

    public function saveTipoDinossauro()
    {
        //$this->validate();

        DB::transaction(function() {
            $tipoDinossauro = TipoDinossauro::create([
                'no_tipo_dinossauro' => $this->no_tipo_dinossauro,
            ]);
        }, $deadlockRetries = 5);


        $this->reset('no_tipo_dinossauro');
        $this->showNovoTipo = false;
        $this->showSuccess  = true;

        return back()->withInput();
    }

    public function delete(TipoDinossauro $tipo)
    {
        $tipo->delete();
    }
}
