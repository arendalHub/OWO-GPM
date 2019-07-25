<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Utilisateur extends Authenticatable
{
    protected $table = 'utilisateurs';
	public $timestamps = false;
    protected $primaryKey = 'id_utilisateur';
    protected $fillable = ['id_utilisateur','login_utilisateur', 'password_utilisateur', 'id_profil', 'actif','supprime'];
}
