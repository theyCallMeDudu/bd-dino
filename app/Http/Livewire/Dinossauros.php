<?php

namespace App\Http\Livewire;

use App\Models\Dinossauro;
use App\Models\FamiliaDinossauro;
use App\Models\TipoDinossauro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dinossauros extends Component
{
    public $no_dinossauro;
    public $cd_tipo_dinossauro;
    public $cd_familia_dinossauro;
    public $showNovoDinossauro = false;
    public $showVerDinossauro  = false;
    public $showSuccess        = false;
    public $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    protected $rules = [
        'no_dinossauro' => 'required',
        'cd_tipo_dinossauro' => 'required',
        'cd_familia_dinossauro' => 'required'
    ];

    public function mount(Request $request)
    {
        if ($request->has('verified') && $request->verified == 1) {
            $this->showSuccess = true;
        }
    }

    public function render()
    {
        $dinossauros = Dinossauro::all();
        $tipos = TipoDinossauro::all();
        $familias = FamiliaDinossauro::all();

        return view('livewire.dinossauros', [
            'dinossauros' => $dinossauros,
            'familias' => $familias,
            'tipos' => $tipos
        ]);
    }

    public function saveDinossauro()
    {
        //$this->validate();
        //dd('nome: ' . $this->no_dinossauro . ' | ' . 'familia: ' . $this->cd_familia_dinossauro.' | ' . 'tipo: '.$this->cd_tipo_dinossauro);
        DB::transaction(function() {
            Dinossauro::create([
                'no_dinossauro'         => $this->no_dinossauro,
                'cd_tipo_dinossauro'    => $this->cd_tipo_dinossauro,
                'cd_familia_dinossauro' => $this->cd_familia_dinossauro,
            ]);
        }, $deadlockRetries = 5);

        $this->reset('no_dinossauro');
        $this->reset('cd_tipo_dinossauro');
        $this->reset('cd_familia_dinossauro');
        $this->showNovoDinossauro = false;
        $this->showSuccess        = true;

        // session()->flash('message', 'Dinossauro criado com sucesso');
        return back()->withInput();
    }

    public function showDinossauro()
    {

    }

    public function delete(Dinossauro $dinossauro)
    {
        $dinossauro->delete();
    }
}
