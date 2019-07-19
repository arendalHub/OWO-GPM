<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Livraison', function (Blueprint $table) {
            $table->bigIncrements('id_livraison');
            $table->bigInteger('id_commande');
            $table->timestamp('date_livraison');

            $table->foreign('id_commande')->on('Commande')
                ->references('id_commande') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Livraison');
    }
}
