<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:23:25 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Models\Traits\HasCompositePrimaryKey;

/**
 * Class Extension
 * 
 * @property int $codigo_unidad_academica
 * @property int $codigo_extension
 * @property string $nombre
 * @property Carbon $fecha_creacion
 * @property string $usuario
 * @property Carbon $fecha_u
 * @property bool $activa
 * 
 * @property Facultad $facultad
 *
 * @package App\Models
 */
class Extension extends Eloquent
{
    use HasCompositePrimaryKey; //Permite llaves compuestas

    /**
     * Array de llaves primarias de la tabla
     *
     * @var array
     */
    protected $primaryKey = ['codigo_unidad_academica', 'codigo_extension'];

	protected $table = 'extension';
	public $incrementing = false;
	public $timestamps = false;

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
        return $this->belongsTo('App\Models\Facultad', 'codigo_unidad_academica','codfac');
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
}
