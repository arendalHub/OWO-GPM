<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = "Commande" ;
    protected $primaryKey = "id_commande" ;
    protected $perPage = 5 ;
}
