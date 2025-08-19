<?php

namespace App\Models;

use App\Models\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;

class RolPermiso extends Model
{
    use HasCompositePrimaryKey;

    protected $table = 'rol_permiso';
    protected $primaryKey = ['rol_codigo','permiso_idpermiso'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [

        'rol_codigo',
        'permiso_idpermiso',
    ];


    public function rolAplicaciones()
    {
        return $this->belongsTo('App\Models\RolAplicaciones', 'rol_codigo','id');
    }

    public function permiso()
    {
        return $this->belongsTo('App\Models\Permiso','permiso_idpermiso','idpermiso');
    }
}
