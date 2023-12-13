<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titlu');
            $table->string('descriere');
            $table->time('ora_inceput');
            $table->time('ora_final');
            $table->unsignedBigInteger('eveniment_id')->nullable();
            $table->timestamps();

            $table->foreign('eveniment_id')
                ->references('id')
                ->on('evenimente')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('agenda');
    }
};
