<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Droit extends Model
{
    protected $table = 'droits';
	public $timestamps = false;
	protected $primaryKey = 'id_droit';
	protected $fillable = ['id_droit','libelle_droit','supprime'];
}
