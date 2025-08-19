<?php

namespace App\PortalAdministrativo;

use Illuminate\Database\Eloquent\Model;

class facultad extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'facultad';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'codfac';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_ua',
        'codfac',
        'nomfac',
        'nomcorto',
        'correo',
        'niv_tecnico',
        'niv_licenciatura',
        'niv_posgrado',
        'depto',
        'rangoCarnet',
        'wsPruebaBasica',
        'wsPruebaEspecifica',
        'activa',
        'observaciones',
    ];

    public function tipo_unidad_academica()
    {
        return $this->belongsTo('App\PortalAdministrativo\tipo_UA', 'tipo_ua','tipo');
    }

    public function departamento()
    {
        return $this->belongsTo('App\PortalAdministrativo\departamento','depto','codigo');
    }

    public $timestamps = false;
    
}
