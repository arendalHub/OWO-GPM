<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $table = 'dossiers';
	public $timestamps = false;
	protected $primaryKey = 'id_dossier';
	protected $fillable = ['id_dossier','num_dossier','photo','naissance','nationnalite','cni','passeport',
        'diplome1','diplome2','diplome3','attestation1','attestation2','attestation3','supprime'];
}
