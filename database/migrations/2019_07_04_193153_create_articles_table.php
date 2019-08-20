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
            $table->bigIncrements('id_article');
            $table->string('code_article', 45);
            $table->bigInteger('id_famille');
            $table->string('designation_article', 128);
            $table->bigInteger('quantite_stock')->default(0);
            $table->decimal('prix_achat');
            $table->decimal('prix_vente');
            $table->bigInteger('seuil_alert');
            $table->bigInteger('seuil_critique');
            $table->boolean('consommable')->default(false);
            $table->boolean('supprime')->default(false);
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
