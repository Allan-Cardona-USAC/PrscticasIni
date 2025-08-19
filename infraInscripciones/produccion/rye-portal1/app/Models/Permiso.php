<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permiso';
    protected $primaryKey = 'idpermiso';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idpermiso',
        'nombre_permiso',
    ];
}
