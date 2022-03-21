<?php

namespace App\Http\Livewire\Dinossauro;

use App\Models\Dinossauro;
use Livewire\Component;

class DinossauroShow extends Component
{
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
        $this->ft_dinossauro         = $dinossauro->ft_dinossauro;
    }

    public function render()
    {
        $dinossauro = Dinossauro::find($this->cd_dinossauro);
        return view('livewire.dinossauro.dinossauro-show', ['dinossauro' => $dinossauro]);
    }
}
