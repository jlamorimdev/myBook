<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    protected $table = 'livros';
    protected $primaryKey = 'id_livro';

    public $timestamps = false;
    protected $fillable = [
    	'nome',
    	'autor',
    	'id_editora',
    	'id_tipo',
    	'paginas',
    ];

    protected $guarded = [];
}
