<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ArticleCommande', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_commande');
            $table->bigInteger('id_article');
            $table->bigInteger('quantite');
            $table->timestamps();

            $table->foreign('id_commande')->on("Commande")
                ->references('id_commande') ;
            $table->foreign("id_article")->on("Article")
                ->references("id_article") ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ArticleCommande');
    }
}
