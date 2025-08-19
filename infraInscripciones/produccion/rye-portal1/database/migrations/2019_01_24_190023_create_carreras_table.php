<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->increments('codigo_carrera');
            $table->timestamps();
            $table->integer('codigo_unidad_academica')->nullable();
            $table->integer('codigo_extension')->nullable();
            $table->integer('codigo_carrerra')->nullable();
            $table->integer('codigo_nivel')->nullable();
            $table->integer('estado')->nullable();
            $table->text('nombre_carrera')->nullable();
            $table->text('titulo_masculino')->nullable();
            $table->text('titulo_femenino')->nullable();
            $table->text('telefono')->nullable();
            $table->string('email')->nullable();
            $table->text('pagina_web')->nullable();
            $table->date('fecha_activacion')->nullable();
            $table->date('fecha_creacion')->nullable();
            $table->integer('estado_ingreso')->nullable();
            $table->integer('estado_reingreso')->nullable();
            $table->integer('estado_peg')->nullable();
            $table->integer('estado_graduados')->nullable();
            $table->integer('requiere_cierrre')->nullable();
            $table->integer('requiere_privado')->nullable();
            $table->integer('requiere_publico')->nullable();
            $table->integer('requiere_eps')->nullable();
            $table->integer('requiere_tesis')->nullable();
            $table->integer('prerequisito')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('usuario')->nullable();
            $table->dateTime('fecha_u')->nullable();
            $table->integer('car_multiple')->nullable();
            $table->string('regimen');
            $table->integer('pruebaEspecifica')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carreras');
    }
}
