<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:28:48 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class InformacionAspirante
 *
 * @property int $nov
 * @property string $apellido1
 * @property string $apellido2
 * @property string $nombre1
 * @property string $nombre2
 * @property string $otros_nombres
 * @property string $direccion
 * @property int $muni_recide
 * @property int $depto_recide
 * @property int $cod_Postal
 * @property bool $tipoDiversificado
 * @property int $cod_titulo_diversificado
 * @property Carbon $f_graduacion
 * @property string $cod_establecimiento
 * @property string $nombre_establecimiento
 * @property int $tipo_establecimiento
 * @property string $direccion_establecimiento
 * @property int $pais_establecimiento
 * @property int $depto_establecimiento
 * @property int $muni_establecimiento
 * @property int $postalEstablecimiento
 * @property int $nacionalidad
 * @property Carbon $fecha_nacimiento
 * @property string $correo_electronico
 * @property float $etnia
 * @property float $idioma_etnia
 * @property float $idioma_gt
 * @property string $idioma_no_gt
 * @property int $sexo
 * @property int $estado_civil
 * @property string $telefono
 * @property string $celular
 * @property string $proveedor_cel
 * @property string $numero_orden
 * @property string $numero_registro
 * @property string $numero_pasaporte
 * @property string $numero_partida
 * @property string $numero_libro
 * @property string $numero_folio
 * @property int $pais_extendida
 * @property int $depto_extendida
 * @property int $muni_extendida
 * @property int $pais_nac
 * @property int $depto_nac
 * @property int $muni_nac
 * @property string $pin
 * @property string $nit
 * @property int $confirmado
 *
 * @package App\Models
 * @mixin Eloquent
 * @mixin QueryBuilder
 */
class InformacionAspirante extends Eloquent
{
	protected $table = 'informacion_aspirante';
	protected $primaryKey = 'nov';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'nov' => 'int',//
		'muni_recide' => 'int',//
		'depto_recide' => 'int',//
		'cod_Postal' => 'int',//
		'tipoDiversificado' => 'int',//
		'cod_titulo_diversificado' => 'int',//
		'tipo_establecimiento' => 'int',//
		'pais_establecimiento' => 'int',//
		'depto_establecimiento' => 'int',//
		'muni_establecimiento' => 'int',//
		'postalEstablecimiento' => 'int',//
		'nacionalidad' => 'int',//
		'etnia' => 'float',//
		'idioma_etnia' => 'float',//
		'idioma_gt' => 'float',//
		'sexo' => 'int',//
		'estado_civil' => 'int',//
		'pais_extendida' => 'int',//
		'depto_extendida' => 'int',//
		'muni_extendida' => 'int',//
		'pais_nac' => 'int',//
		'depto_nac' => 'int',//
		'muni_nac' => 'int',//
		'confirmado' => 'int',//
        'nit' => 'int'//
	];

	protected $dates = [
		'f_graduacion',//
		'fecha_nacimiento'//
	];

	protected $fillable = [
		'apellido1',//
		'apellido2',//
		'nombre1',//
		'nombre2',//
		'otros_nombres',//
		'direccion',//
		'muni_recide',//
		'depto_recide',//
		'cod_Postal',//
		'tipoDiversificado',//
		'cod_titulo_diversificado',//
		'f_graduacion',//
		'cod_establecimiento',//
		'nombre_establecimiento',//
		'tipo_establecimiento',//
		'direccion_establecimiento',//
		'pais_establecimiento',//
		'depto_establecimiento',//
		'muni_establecimiento',//
		'postalEstablecimiento',//
		'nacionalidad',//
		'fecha_nacimiento',//
		'correo_electronico',//
		'etnia',//
		'idioma_etnia',//
		'idioma_gt',//
		'idioma_no_gt',//
		'sexo',//
		'estado_civil',//
		'telefono',//
		'celular',//
		'proveedor_cel',//
		'numero_orden',//
		'numero_registro',//
		'numero_pasaporte',//
		'numero_partida',//
		'numero_libro',//
		'numero_folio',//
		'pais_extendida',//
		'depto_extendida',//
		'muni_extendida',//
		'pais_nac',//
		'depto_nac',//
		'muni_nac',//
		'pin',//
		'nit',
		'confirmado',
        'verification_state'
	];

    /**
     * Relacion con el modelo departamento
     * permite acceder a los datos del departamento
     * @return BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo('App\Models\Departamento', 'depto_recide','codigo');
    }


    public function getMunicipio()
    {
        return Municipio::where('cod_depto', $this->depto_recide)
            ->where('cod_muni',$this->muni_recide)->firstOrFail();
    }

    public function  postal()
    {
        return $this->belongsTo('App\Models\Postal','cod_postal','cod_postal')
            ->where('cod_depto', '=', $this->depto_recide)
            ->where('cod_muni', '=',$this->muni_recide);
    }

    public function paisNacimiento()
    {
        return $this->belongsTo('App\Models\Pais','pais_nac','codigo');
    }

    public function departamentoNacimiento()
    {
        return $this->belongsTo('App\Models\Departamento', 'depto_nac','codigo');
    }

    public function municipioNacimiento()
    {
        return $this->belongsTo('App\Models\Municipio','muni_nac','cod_muni')
            ->where('cod_depto', $this->depto_nac);
    }

    /**
     * Retorna el nombre completo del aspirante
     * @return string
     */
    public function getNombreCompleto(){
        $nombre = $this->nombre1;

        if ($this->nombre2){
            $nombre .=  " " . $this->nombre2;
        }
        if ($this->otros_nombres){
            $nombre .=  " " . $this->otros_nombres;
        }
        $nombre .= " " . $this->apellido1 . " " . $this->apellido2;

        return $nombre;
    }

    /**
     * Retorna si el aspirante es extranjero o no
     * @return bool
     */
    public function esExtranjero(){
        return ($this->numero_orden == 'PAS');
    }

    public function  getApellido1()
    {
        return $this->apellido1;
    }
    public function  getApellido2()
    {
        return $this->apellido2;
    }
    public function  getOtrosNombres()
    {
        return $this->otros_nombres;
    }

    public function  getNov()
    {
        return $this->nov;
    }

    public  function getCui()
    {
        if($this->numero_orden === 'DPI') {
            return $this->numero_registro;
        }else{
            return $this->numero_orden . ' ' . $this->numero_registro;
        }
    }

    public function getGenero(){

        if($this->sexo === 1){
            $genero = 'Masculino';
        }elseif ($this->sexo === 2){
            $genero = 'Femenino';
        }else{
            $genero = 'No definido';
        }

        return $genero;
    }

    public  function  getCorreo(){
        return $this->correo_electronico;
    }

    public function  getFechaNacimiento(){
        return Carbon::parse($this->fecha_nacimiento)->format('d/m/Y');
    }
}
