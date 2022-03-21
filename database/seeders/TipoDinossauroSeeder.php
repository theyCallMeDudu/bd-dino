<?php

namespace Database\Seeders;

use App\Models\TipoDinossauro;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TipoDinossauroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDinossauro::create([
            'no_tipo_dinossauro' => 'Herbívoro',
            'dt_inclusao' => Carbon::now()
        ]);

        TipoDinossauro::create([
            'no_tipo_dinossauro' => 'Carnívoro',
            'dt_inclusao' => Carbon::now()
        ]);

        TipoDinossauro::create([
            'no_tipo_dinossauro' => 'Onívoro',
            'dt_inclusao' => Carbon::now()
        ]);
    }
}
