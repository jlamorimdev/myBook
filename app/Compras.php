<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
     protected $table = 'compras';
    protected $primaryKey = 'id_compra';

    public $timestamps = false;
    protected $fillable = [
    	'livro',
    	'autor',
    	'valor'
    ];

    protected $guarded = [];
}
