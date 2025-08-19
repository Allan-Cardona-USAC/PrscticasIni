<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipoUAsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo__u_as', function (Blueprint $table) {
            $table->increments('tipo');
            $table->timestamps();
            $table->integer('tipo')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('prioridad')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tipo__u_as');
    }
}
