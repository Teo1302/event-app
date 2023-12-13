<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParteneriTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('parteneri', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nume');
            $table->string('contact');
            $table->string('email');
            $table->string('descriere');
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
        Schema::dropIfExists('parteneri');
    }
};
