<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagasinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Magasin', function (Blueprint $table) {
            $table->bigIncrements('id_magasin');
            $table->string("libelle_magasin") ;
            $table->string("adresse_magasin") ;
            $table->boolean("supprime")->default(false) ;
            $table->timestamps();
        });

//        Schema::table('Magasin', function (Blueprint $table){
//            $table->unsignedBigInteger('id_employe');
//            $table->foreign('id_employe')->references('id_employe')->on('employes')->onUpdate('no action')->onDelete('no action');
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Magasin');
    }
}
