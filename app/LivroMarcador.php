<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LivroMarcador extends Model
{
     protected $table = 'livro_marcador';
    protected $primaryKey = 'id_livro_marcador';

    public $timestamps = false;
    protected $fillable = [
    	'id_livro',
    	'id_marcador',
    ];

    protected $guarded = [];
}
