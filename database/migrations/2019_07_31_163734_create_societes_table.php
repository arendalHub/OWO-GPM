<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societes', function (Blueprint $table) {
            $table->bigIncrements('id_societe');
            $table->string('raison_sociale_societe');
            $table->string('adresse_societe');
            $table->string('bp_societe');
            $table->string('telephone1_societe');
            $table->string('telephone2_societe');
            $table->string('nif_societe');
            $table->string('num_cfe_societe');
            $table->string('email_societe');
            $table->string('site_web_societe');
            $table->string('autres_infos_societe');
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
        Schema::dropIfExists('societes');
    }
}
