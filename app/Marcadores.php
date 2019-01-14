<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcadores extends Model
{
    protected $table = 'marcadores';
    protected $primaryKey = 'id_marcador';

    public $timestamps = false;
    protected $fillable = [
    	'nome',
    ];

    protected $guarded = [];
}
