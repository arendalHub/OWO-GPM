<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('Article', function (Blueprint $table)
        {
            $table->bigIncrements('id_article') ;
            $table->string('code_article', 45) ;
            $table->bigInteger('id_famille') ;
            $table->bigInteger('id_magasin') ;
            $table->string('designation_article', 128) ;
            $table->decimal('prix_vente') ;
            $table->decimal('prix_achat') ;
            $table->boolean('consommable');
            $table->string('stock_etagere', 128);
            $table->string('stock_range', 128);
            $table->string('stock_box', 128);
            $table->boolean('supprime')->default(false);

//            $table->bigInteger('id_famille') ;
//            $table->foreign('id_famille')->references('id_famille')->on('FamilleArticle') ;

            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Article');
    }
}
