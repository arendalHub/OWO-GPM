<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = 'zones';
	public $timestamps = false;
    protected $primaryKey = 'id_zone';
    protected $fillable = ['id_zone','nom_zone','supprime'];
}
