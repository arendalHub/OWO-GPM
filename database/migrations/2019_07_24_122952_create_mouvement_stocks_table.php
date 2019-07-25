<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMouvementStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MouvementStock', function (Blueprint $table) {
            $table->bigIncrements('id_mouvement_stock');
            $table->bigInteger('id_type_mouvement_stock') ;
            $table->bigInteger('id_livraison')->nullable();
            $table->bigInteger('id_article')->nullable();
            $table->bigInteger('quantite_mouvement');
            $table->string('date_mouvement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MouvementStock');
    }
}
