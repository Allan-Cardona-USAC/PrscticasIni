<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaAccion extends Model
{
    protected $table = 'categoriaAccion';
    protected $primaryKey = 'idCategoria';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [

        'idCategoria',
        'nombre_categoria',
    ];
}
