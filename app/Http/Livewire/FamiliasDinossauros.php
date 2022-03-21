<?php

namespace App\Http\Livewire;

use App\Models\FamiliaDinossauro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FamiliasDinossauros extends Component
{
    public $no_familia_dinossauro;
    public $showNovaFamilia = false;
    public $showSuccess     = false;
    public $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    protected $rules = [
        'no_familia_dinossauro' => 'required',
    ];

    public function mount(Request $request)
    {
        if ($request->has('verified') && $request->verified == 1) {
            $this->showSuccess = true;
        }
    }

    public function render()
    {
        $familias = FamiliaDinossauro::where('no_familia_dinossauro', 'like', "%{$this->search}%")->get();
        return view('livewire.familias-dinossauros', [
            'familias' => $familias
        ]);
    }

    public function saveFamiliaDinossauro()
    {
        //$this->validate();

        DB::transaction(function() {
            $familiaDinossauro = FamiliaDinossauro::create([
                'no_familia_dinossauro' => $this->no_familia_dinossauro,
            ]);
        }, $deadlockRetries = 5);


        $this->reset('no_familia_dinossauro');
        $this->showNovaFamilia = false;
        $this->showSuccess     = true;

        return back()->withInput();
    }

    public function delete(FamiliaDinossauro $familia)
    {
        $familia->delete();
    }
}
