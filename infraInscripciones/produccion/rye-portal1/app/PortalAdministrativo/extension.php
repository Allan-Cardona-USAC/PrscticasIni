<?php

namespace App\PortalAdministrativo;

use App\Models\ExtensionLugar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class extension extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'extension';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'codigo_extension';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo_unidad_academica',
        'codigo_extension',
        'nombre',
        'fecha_creacion',
        'usuario',
        'fecha_u',
        'activa'
    ];

    public function unidad_academica()
    {
        return $this->belongsTo('App\PortalAdministrativo\facultad', 'codigo_unidad_academica','codfac');
    }

    public function extensiones_ua($ua)
    {
        return $this->where('codigo_unidad_academica', '=', $ua);
    }


    /**
     * Override para poder actualizar registros con llave primaria compuesta.
     *
     *
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('codigo_extension', '=', $this->getAttribute('codigo_extension'))
            ->where('codigo_unidad_academica', '=', $this->getAttribute('codigo_unidad_academica'));
        return $query;
    }

    public function lugarExtension()
    {
        $extensionLugar = ExtensionLugar::where('codigo_unidad_academica',$this->codigo_unidad_academica)
            ->where('codigo_extension',$this->codigo_extension)->first();
        return  $extensionLugar->lugar_estudios;
    }

    public $timestamps = false;
}