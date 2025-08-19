<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacultadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facultads', function (Blueprint $table) {
            $table->increments('codfac');
            $table->timestamps();
            $table->integer('tipo_ua')->nullable();
            $table->integer('codfac')->nullable();
            $table->text('nomfac')->nullable();
            $table->text('nomcorto')->nullable();
            $table->string('correo')->nullable();
            $table->integer('niv_tecnico')->nullable();
            $table->integer('niv_licenciatura')->nullable();
            $table->integer('niv_posgrado')->nullable();
            $table->integer('depto')->nullable();
            $table->integer('rangoCarnet')->nullable();
            $table->text('wsPruebaBasica')->nullable();
            $table->text('wsPruebaEspecifica')->nullable();
            $table->foreign('tipo_ua')->references('tipo')->on('tipo_UA')->onDelete('no action')->onUpdate('no action');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facultads');
    }
}
