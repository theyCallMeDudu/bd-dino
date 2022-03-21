<?php

namespace App\Http\Livewire;

use App\Models\Dinossauro;
use Livewire\Component;

class ModalDinossauro extends Component
{
    public $cd_dinossauro;
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

    public function render()
    {
        return view('livewire.modal');
    }
}
