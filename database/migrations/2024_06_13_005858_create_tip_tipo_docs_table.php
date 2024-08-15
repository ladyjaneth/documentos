<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipTipoDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //levantar
    {
        Schema::create('tip_tipo_doc', function (Blueprint $table) {
            $table->id('tip_id');
            $table->string('tip_nombre', 100);
            $table->string('tip_prefijo',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tip_tipo_doc');
    }
}
