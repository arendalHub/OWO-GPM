<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('id_section');
            $table->string('nom_section');
            $table->boolean('supprime')->default(false);
            $table->timestamps();
        });

        Schema::table('sections', function (Blueprint $table){
           $table->unsignedBigInteger('id_zone');
           $table->foreign('id_zone')->references('id_zone')->on('zones')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
