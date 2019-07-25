<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
	public $timestamps = false;
    protected $primaryKey = 'id_section';
    protected $fillable = ['id_section','nom_section','id_zone','supprime'];
}
