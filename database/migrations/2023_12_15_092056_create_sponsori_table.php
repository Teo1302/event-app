<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsoriTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sponsori', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nume');
            $table->string('descriere');
            $table->string('contact');
            $table->string('adresa');
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
        Schema::dropIfExists('sponsori');
    }
};
