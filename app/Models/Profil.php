<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profils';
	public $timestamps = false;
	protected $primaryKey = 'id_profil';
    protected $fillable = ['id_profil','libelle_profil','supprime'];

}
