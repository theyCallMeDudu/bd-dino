<?php

namespace App\Http\Livewire\Dinossauro;

use App\Models\Dinossauro;
use App\Models\FamiliaDinossauro;
use App\Models\TipoDinossauro;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
class DinossauroEdit extends Component
{
    use WithFileUploads;

    public $cd_dinossauro;
    public $no_dinossauro;
    public $cd_familia_dinossauro;
    public $cd_tipo_dinossauro;
    public $ft_dinossauro;

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

        $dinossauro = Dinossauro::find($this->cd_dinossauro);
        // Se nova foto for selecionada para upload, removemos a anterior
        if ($this->ft_dinossauro) {
            // se a foto realmente existir, será apagada
            if (Storage::disk('public')->exists($dinossauro->ft_dinossauro)) {
                Storage::disk('public')->delete($dinossauro->ft_dinossauro);
            }

            $this->ft_dinossauro = $this->ft_dinossauro->store('dinossauros', 'public');
        }

        $dinossauro->update([
            'no_dinossauro'         => $this->no_dinossauro,
            'cd_familia_dinossauro' => $this->cd_familia_dinossauro,
            'cd_tipo_dinossauro'    => $this->cd_tipo_dinossauro,
            'ft_dinossauro'         => $this->ft_dinossauro ?? $dinossauro->ft_dinossauro
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
