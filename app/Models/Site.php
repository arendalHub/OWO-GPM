<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';
	public $timestamps = false;
    protected $primaryKey = 'id_site';
    protected $fillable = ['id_site','nom_site', 'adresse_site', 'longitude_site', 'lattitude_site', 'date_debut_travaux_site', 'date_fin_travaux_site', 'duree_travaux_site','id_section','supprime'];
}
