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
            $table->bigIncrements('id_founisseur');
            $table->string('designation_fournisseur', 75);
            $table->string('adresse_fournisseur', 150)->nullable();
            $table->string('contact_fournisseur', 35);
            $table->string('email_fournisseur', 100)->nullable();
            $table->integer('bp_fournisseur')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
