<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editoras extends Model
{
    protected $table = 'editoras';
    protected $primaryKey = 'id_editora';

    public $timestamps = false;
    protected $fillable = [
    	'nome',
    ];

    protected $guarded = [];
}
