<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDroitProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('droit_profils', function (Blueprint $table) {
            $table->boolean('lire');
            $table->boolean('creer');
            $table->boolean('modifier');
            $table->boolean('supprimer');
            $table->timestamps();
        });

        Schema::table('droit_profils', function (Blueprint $table){
           $table->unsignedBigInteger('id_profil');
           $table->foreign('id_profil')->references('id_profil')->on('profils')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('droit_profils', function (Blueprint $table){
           $table->unsignedBigInteger('id_droit');
           $table->foreign('id_droit')->references('id_droit')->on('droits')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('droit_profils');
    }
}
