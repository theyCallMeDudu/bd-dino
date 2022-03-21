<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTipoDinossauroTable extends Migration
{
    public function up()
    {
        Schema::create('tb_tipo_dinossauro', function (Blueprint $table) {
            $table->increments('cd_tipo_dinossauro');
            $table->string('no_tipo_dinossauro');
            $table->dateTime('dt_inclusao')->default(Carbon::now());
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_tipo_dinossauro');
    }
}
