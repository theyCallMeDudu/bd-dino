<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDinossauroTable extends Migration
{
    public function up()
    {
        Schema::create('tb_dinossauro', function (Blueprint $table) {
            $table->increments('cd_dinossauro');
            $table->integer('cd_familia_dinossauro')->unsigned()->index();
            $table->integer('cd_tipo_dinossauro')->unsigned()->index();
            $table->string('no_dinossauro');
            $table->longText('ft_dinossauro')->nullable();
            $table->dateTime('dt_inclusao')->default(Carbon::now());
            $table->foreign('cd_familia_dinossauro')->references('cd_familia_dinossauro');
            $table->foreign('cd_tipo_dinossauro')->references('cd_tipo_dinossauro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_dinossauro');
    }
}
