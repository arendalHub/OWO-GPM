<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id_site');
            $table->string('nom_site');
            $table->string('adresse_site');
            $table->string('longitude_site');
            $table->string('lattitude_site');
            $table->date('date_deb_travaux_site');
            $table->date('date_fin_travaux_site');
            $table->string('duree_travaux_site');
            $table->boolean('supprime')->default(false);
            $table->timestamps();
        });

        Schema::table('sites', function (Blueprint $table){
           $table->unsignedBigInteger('id_section');
           $table->foreign('id_section')->references('id_section')->on('sections')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
