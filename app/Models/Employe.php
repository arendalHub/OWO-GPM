<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $table = 'employes';
	public $timestamps = false;
	protected $primaryKey = 'id_employe';
	protected $fillable = ['id_employe','matricule_employe','nom_employe','prenom_employe','date_naiss_employe','lieu_naiss_employe','sexe_employe','adresse_employe','pere_employe','mere_employe','situation_mat_employe','nb_enfant_employe','type_piece_employe', 'num_piece_employe', 'niveau_etudes_employe','date_entree_employe','date_depart_employe','date_sortie_employe','num_cnss_employe','contrat_employe','supprime'];
}
