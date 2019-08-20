<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_sites', function (Blueprint $table) {
            $table->boolean('date_affectation');
            $table->timestamps();
        });

        Schema::table('employe_sites', function (Blueprint $table) {
            $table->unsignedBigInteger('id_employe');
            $table->foreign('id_employe')->references('id_employe')->on('employes')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('employe_sites', function (Blueprint $table) {
            $table->unsignedBigInteger('id_site');
            $table->foreign('id_site')->references('id_site')->on('sites')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employe_sites');
    }
}
