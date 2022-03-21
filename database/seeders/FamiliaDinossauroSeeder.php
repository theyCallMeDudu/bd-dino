<?php

namespace Database\Seeders;

use App\Models\FamiliaDinossauro;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FamiliaDinossauroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FamiliaDinossauro::create([
            'no_familia_dinossauro' => 'Terópodes',
            'dt_inclusao' => Carbon::now()
        ]);

        FamiliaDinossauro::create([
            'no_familia_dinossauro' => 'Saurópodes',
            'dt_inclusao' => Carbon::now()
        ]);

        FamiliaDinossauro::create([
            'no_familia_dinossauro' => 'Ceratopsídeos',
            'dt_inclusao' => Carbon::now()
        ]);

        FamiliaDinossauro::create([
            'no_familia_dinossauro' => 'Estegossauros',
            'dt_inclusao' => Carbon::now()
        ]);

        FamiliaDinossauro::create([
            'no_familia_dinossauro' => 'Anquilossauros',
            'dt_inclusao' => Carbon::now()
        ]);

        FamiliaDinossauro::create([
            'no_familia_dinossauro' => 'Ornitópodes',
            'dt_inclusao' => Carbon::now()
        ]);

    }
}
