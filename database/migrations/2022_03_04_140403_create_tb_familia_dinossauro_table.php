<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFamiliaDinossauroTable extends Migration
{
    public function up()
    {
        Schema::create('tb_familia_dinossauro', function (Blueprint $table) {
            $table->increments('cd_familia_dinossauro');
            $table->string('no_familia_dinossauro');
            $table->dateTime('dt_inclusao')->default(Carbon::now());
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_familia_dinossauro');
    }
}
