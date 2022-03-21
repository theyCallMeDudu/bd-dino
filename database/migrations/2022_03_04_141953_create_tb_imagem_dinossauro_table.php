<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbImagemDinossauroTable extends Migration
{
    public function up()
    {
        Schema::create('tb_imagem_dinossauro', function (Blueprint $table) {
            $table->increments('cd_imagem_dinossauro');
            $table->integer('cd_dinossauro')->unsigned()->index();
            $table->longText('no_imagem_dinossauro');
            $table->dateTime('dt_inclusao')->default(Carbon::now());
            $table->foreign('cd_dinossauro')->references('cd_dinossauro');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_imagem_dinossauro');
    }
}
