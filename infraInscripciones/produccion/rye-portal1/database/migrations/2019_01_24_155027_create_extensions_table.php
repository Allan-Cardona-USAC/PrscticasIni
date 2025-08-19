<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extensions', function (Blueprint $table) {
            $table->increments('codigo_unidad_academica|codigo_extension');
            $table->timestamps();
            $table->integer('codigo_unidad_academica')->nullable();
            $table->integer('codigo_extension')->nullable();
            $table->text('nombre')->nullable();
            $table->date('fecha_creacion')->nullable();
            $table->text('usuario')->nullable();
            $table->dateTime('fecha_u')->nullable();
            $table->integer('activa')->nullable();
            $table->foreign('codigo_unidad_academica')->references('codfac')->on('facultad')->onDelete('no action')->onUpdate('no action');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('extensions');
    }
}
