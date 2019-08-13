<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Articlemouvement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ArticleMouvement', function (Blueprint $table)
        {
            $table->bigIncrements('id_article_mouvement');
            $table->bigInteger('id_mouvement');
            $table->bigInteger('id_article');
            $table->bigInteger('quantite_mouvement');
            $table->decimal('prix')->default(0);
            $table->string('date_peremption', 45)->nullable();
            $table->string('date_fabrication', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
