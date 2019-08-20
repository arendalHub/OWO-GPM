<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Utilisateur extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $table = 'utilisateurs';
	public $timestamps = false;
    protected $primaryKey = 'id_utilisateur';
    protected $fillable = ['id_utilisateur','nom_utilisateur','prenom_utilisateur','login','service_utilisateur','poste_utilisateur', 'password', 'id_profil', 'profil_temporaire', 'actif','supprime'];

    public function testDatabase()
    {
        $user = \factory(App\Utilisateur::class)->make();
    }
}
