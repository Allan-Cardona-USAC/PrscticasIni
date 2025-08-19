<?php

namespace App\PortalAdministrativo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use \App\PortalAdministrativo\extension;

class carrera extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carrera_temporal';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'codigo_carrera';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_unidad_academica',
        'codigo_extension',
        'codigo_carrera',
        'codigo_nivel',
        'estado',
        'nombre_carrera',
        'titulo_masculino',
        'titulo_femenino',
        'telefono',
        'email',
        'pagina_web',
        'fecha_activacion',
        'fecha_creacion',
        'estado_ingreso',
        'estado_reingreso',
        'estado_peg',
        'estado_graduados',
        'requiere_cierrre',
        'requiere_privado',
        'requiere_publico',
        'requiere_eps',
        'requiere_tesis',
        'prerequisito',
        'descripcion',
        'usuario',
        'fecha_u',
        'car_multiple',
        'regimen',
        'pruebaEspecifica',
        'observaciones'
    ];

    public $timestamps = false;

    public function unidad_academica()
    {
        return $this->belongsTo('App\PortalAdministrativo\facultad', 'codigo_unidad_academica','codfac');
    }

    public function extension()
    {
        return $this->belongsTo('App\PortalAdministrativo\extension', 'codigo_extension','codigo_extension')->where('codigo_unidad_academica',$this->codigo_unidad_academica);
    }

    public function nivel_academico()
    {
        return $this->belongsTo('App\Models\NivelAcademico', 'codigo_nivel','codigo_nivel_academico');
    }

     /**
     * Override para poder actualizar registros con llave primaria compuesta.
     *
     *
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('codigo_carrera', '=', $this->getAttribute('codigo_carrera'))
            ->where('codigo_extension', '=', $this->getAttribute('codigo_extension'))
            ->where('codigo_unidad_academica', '=', $this->getAttribute('codigo_unidad_academica'));
        return $query;
    }


    public  function  getCodigoCarrera()
    {
        return str_pad($this->codigo_carrera, 2, "0", STR_PAD_LEFT);
    }

}
