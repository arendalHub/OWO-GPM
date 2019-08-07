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
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('quantite')->unsigned();
            $table->bigInteger('id_article')->unsigned();
            $table->bigInteger('id_livraison')->unsigned();
            $table->bigInteger('prix_entree')->unsigned();
            $table->bigInteger('prix_sortie')->unsigned();
            $table->string('date_peremption', 128);
            $table->string('date_fabrication', 128);

//            $table->foreign('id_article')->on('ArticleCommande')
//                ->references('id_article') ;
//            $table->foreign('id_livraison')->on('Livraison')
//                ->references('id_livraison') ;

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
