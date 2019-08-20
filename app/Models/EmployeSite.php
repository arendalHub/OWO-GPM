<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeSite extends Model
{
    protected $table = 'employe_sites';
    public $timestamps = false;
    protected $primaryKey = ['id_employe', 'id_site'];
    protected $fillable = ['id_employe', 'id_site', 'date_affectation'];
}
