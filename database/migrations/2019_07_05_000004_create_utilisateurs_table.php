<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->bigIncrements('id_utilisateur');
            $table->string('login_utilisateur')->unique();
            $table->string('password_utilisateur');
            $table->boolean('actif')->default(true);
            $table->boolean('supprime')->default(false);
            $table->timestamps();
        });

        Schema::table('utilisateurs', function (Blueprint $table){
           $table->unsignedBigInteger('id_profil');
           $table->foreign('id_profil')->references('id_profil')->on('profils')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
