<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    protected $table = 'societes';
	public $timestamps = false;
    protected $primaryKey = 'id_societe';
    protected $fillable = ['id_societe','raison_sociale_societe','activites_societe','adresse_societe','bp_societe','telephone1_societe','telephone2_societe','nif_societe','num_cfe_societe','email_societe','site_web_societe','autres_infos_societe'];
}
