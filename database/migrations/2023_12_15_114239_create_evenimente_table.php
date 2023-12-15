<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenimenteTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('evenimente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titlu');
            $table->text('descriere');
            $table->date('data');
            $table->time('ora');
            $table->string('locatie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('evenimente');
    }
};
