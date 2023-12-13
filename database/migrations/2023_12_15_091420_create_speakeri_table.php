<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeakeriTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('speakeri', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nume');
            $table->string('prenume');
            $table->string('prezentare');
            $table->string('telefon');
            $table->string('email');
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
        Schema::dropIfExists('speakeri');
    }
};
