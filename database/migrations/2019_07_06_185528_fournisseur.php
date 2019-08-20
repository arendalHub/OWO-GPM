<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fournisseur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Fournisseur', function (Blueprint $table)
        {
            $table->bigIncrements('id_fournisseur');
            $table->string('raison_sociale',50)->nullable();
            $table->string('nif_fournisseur',30)->nullable();
            $table->string('personne_ressource',75);
            $table->string('adresse_fournisseur', 150)->nullable();
            $table->string('contact_fournisseur', 20);
            $table->string('contact_fournisseur_2', 20)->nullable();
            $table->string('email_fournisseur', 100)->nullable();
            $table->string('bp_fournisseur', 11)->nullable();
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
        Schema::dropIfExists('Fournisseur');
    }
}
