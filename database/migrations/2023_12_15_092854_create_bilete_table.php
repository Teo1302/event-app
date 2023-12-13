<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBileteTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bilete', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tip_bilet');
            $table->integer('pret');
            $table->integer('cantitate');
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
        Schema::dropIfExists('bilete');
    }
};
