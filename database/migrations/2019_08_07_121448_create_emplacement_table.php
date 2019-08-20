<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmplacementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplacement', function (Blueprint $table) {
            $table->bigIncrements('id_emplacement');
            $table->bigInteger('id_article');
            $table->bigInteger('id_etagere');
            $table->bigInteger('id_rangee');
            $table->bigInteger('id_box');
            $table->boolean('supprime')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emplacement');
    }
}
