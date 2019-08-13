<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id_employe');
            $table->string('matricule_employe');
            $table->string('nom_employe');
            $table->string('prenom_employe');
            $table->date('date_naiss_employe');
            $table->string('lieu_naiss_employe');
            $table->string('sexe_employe');
            $table->string('num_tel_employe');
            $table->string('adresse_employe');
            $table->string('pere_employe')->nullable();
            $table->string('mere_employe')->nullable();
            $table->string('num_tel_urgence_employe')->nullable();
            $table->string('situation_mat_employe');
            $table->integer('nb_enfant_employe');
            $table->string('type_piece_employe');
            $table->string('num_piece_employe');
            $table->string('niveau_etudes_employe')->nullable();
            $table->date('date_entree_employe');
            $table->date('date_depart_employe')->nullable();
            $table->date('date_sortie_employe')->nullable();
            $table->string('num_cnss_employe')->nullable();
            $table->string('contrat_employe');
            // $table->enum('contrat_employe',['Prestation de service', 'CDD', 'CDI']);
            $table->boolean('supprime')->default(false);
            $table->timestamps();
        });

        Schema::table('employes', function (Blueprint $table){
           $table->unsignedBigInteger('id_dossier')->nullable();
           $table->foreign('id_dossier')->references('id_dossier')->on('dossiers')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('employes', function (Blueprint $table){
           $table->unsignedBigInteger('id_site')->nullable();
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
        Schema::dropIfExists('employes');
    }
}
