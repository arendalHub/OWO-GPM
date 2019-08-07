<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MouvementStock extends Model
{
    protected $table = "MouvementStock" ;
    protected $primaryKey = "id_mouvement_stock" ;
    public $timestamps = false ;
}
