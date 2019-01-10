<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id_tipo';

    public $timestamps = false;
    protected $fillable = [
    	'nome',
    ];

    protected $guarded = [];
}
