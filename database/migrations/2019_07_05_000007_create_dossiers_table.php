<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->bigIncrements('id_dossier');
            $table->integer('num_dossier');
            $table->longText('photo')->nullable();
            $table->longText('naissance')->nullable();
            $table->longText('nationnalite')->nullable();
            $table->longText('cni')->nullable();
            $table->longText('passport')->nullable();
            $table->longText('diplome1')->nullable();
            $table->longText('diplome2')->nullable();
            $table->longText('diplome3')->nullable();
            $table->longText('attestation1')->nullable();
            $table->longText('attestation2')->nullable();
            $table->longText('attestation3')->nullable();
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
        Schema::dropIfExists('dossiers');
    }
}
