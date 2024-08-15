<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_documento', function (Blueprint $table) {
            $table->id('doc_id');
            $table->string('doc_nombre',100);
            $table->string('doc_codigo',100);
            $table->text('doc_contenido');
            $table->unsignedBigInteger('doc_id_tipo'); //crea el campo en la tabla
            $table->foreign('doc_id_tipo')->references('tip_id')->on('tip_tipo_doc');

            $table->unsignedBigInteger('doc_id_proceso');
            $table->foreign('doc_id_proceso')->references('pro_id')->on('pro_proceso');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_documento');
    }
}
