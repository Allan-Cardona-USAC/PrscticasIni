<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolAplicaciones extends Model
{
    protected $table = 'rolAplicaciones';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [

        'id',
        'Nombre',
    ];

}
