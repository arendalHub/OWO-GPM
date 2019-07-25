<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DroitProfil extends Model
{
    protected $table = 'droit_profils';
	public $timestamps = false;
	protected $primaryKey = ['id_droit', 'id_profil'];
    protected $fillable = ['id_droit','id_profil', 'read', 'create', 'update', 'delete'];
}
