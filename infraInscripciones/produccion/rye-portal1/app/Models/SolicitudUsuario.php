<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class solicitudUsuario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'solicitudUsuario';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idsolicitud';

    protected $attributes = array(
        'nombre' => 'A Post'
    );

    //protected $dateFormat = 'dd-mm-YYYY';


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idsolicitud',
        'tipo',
        'CUI',
        'nombre',
        'nom_corto',
        'fecha',
        'apellidos',
        'correo_institucional',
        'correo_personal',
        'telefono_cel',
        'telefono_trabajo',
        'telefono_casa',
        'registro_personal',
        'institucion',
        'autoridad_responsable',
        'puesto',
        'copia_dpi',
        'copia_oficio',
        'estado_idestado',
        'observaciones',
        'dependencia_iddependencia',
    ];

    public function EstadoSolicitud()
    {
        return $this->belongsTo('App\EstadoSolicitud');
    }
    public $timestamps = false;

    public  function  getDependenciaNombre(){
        $dependencia = DB::table('dependencia')->select('descripcion')->where('id',$this->dependencia_iddependencia)->get()->first();
        return $dependencia->descripcion;
    }

    public  function  getFechaSolicitud(){
        return Carbon::parse($this->fecha)->format('d/m/Y');
    }
}
