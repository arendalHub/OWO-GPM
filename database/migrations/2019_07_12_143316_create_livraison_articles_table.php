<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivraisonArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ArticleLivraison', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->bigInteger('quantite');
            $table->bigInteger('id_article');
            $table->bigInteger('id_livraison');
            $table->bigInteger('prix_unitaire');
            $table->timestamp('date_peremption');
            $table->timestamp('date_fabrication');

            $table->foreign('id_article')->on('ArticleCommande')
                ->references('id_article') ;
            $table->foreign('id_livraison')->on('Livraison')
                ->references('id_livraison') ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ArticleLivraison');
    }
}
