<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Commande', function (Blueprint $table) {
            $table->bigIncrements('id_commande');
            $table->timestamp('date_commande');
            $table->bigInteger('id_fournisseur');
            $table->boolean('supprime')->default(false);
            $table->timestamps();

            $table->foreign("id_fournisseur")->on("Fournisseur")
                ->references("id_fournisseur") ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Commande');
    }
}
