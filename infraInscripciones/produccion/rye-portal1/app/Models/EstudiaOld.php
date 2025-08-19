<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Feb 2019 11:13:18 -0600.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class EstudiaOld
 * 
 * @property int $carnet
 * @property string $lit_orien
 * @property int $cod_orien
 * @property string $nombre1
 * @property string $nombre2
 * @property string $nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $direccion
 * @property int $codigo_municipio_recide
 * @property int $codigo_departamento_recide
 * @property string $cod_postal
 * @property Carbon $fec_nac
 * @property int $sexo
 * @property int $lug_nac
 * @property int $cod_nac
 * @property int $est_civ
 * @property string $telefono
 * @property string $celular
 * @property string $empresa
 * @property string $usuario
 * @property Carbon $fecha_u
 * @property int $carnet_ant
 * @property int $annioi
 * @property string $email
 * @property string $pin
 * @property string $nit
 * @property string $numero_folio
 * @property string $numero_libro
 * @property string $numero_partida
 * @property string $numero_orden
 * @property string $numero_registro
 * @property string $tipo_cui
 * @property string $cui
 * @property int $codigo_pais_extendida
 * @property int $codigo_departamento_extendida
 * @property int $codigo_municipio_extendida
 * @property int $codigo_pais_nacimiento
 * @property int $codigo_departamento_nacimiento
 * @property int $codigo_municipio_nacimiento
 * @property int $codigo_titulo_diversificado
 * @property string $year_de_graduacion
 * @property string $nombre_establecimiento
 * @property int $codigo_tipo_establecimiento
 * @property string $direccion_establecimiento
 * @property int $codigo_pais_establecimiento
 * @property int $codigo_departamento_establecimiento
 * @property int $codigo_municipio_establecimiento
 * @property string $numero_pasaporte
 * @property float $etnia
 * @property float $idioma
 * @property float $otroIdioma
 * @property int $activo
 * @property string $observaciones
 * @property string $pin_hash
 * @property string $remember_token
 *
 * @package App\Models
 * @method static where(string $string, string $noCarnet)
 */
class EstudiaOld extends Eloquent
{
	protected $table = 'estudia_old';
	protected $primaryKey = 'carnet';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'carnet' => 'int',
		'cod_orien' => 'int',
		'codigo_municipio_recide' => 'int',
		'codigo_departamento_recide' => 'int',
		'sexo' => 'int',
		'lug_nac' => 'int',
		'cod_nac' => 'int',
		'est_civ' => 'int',
		'carnet_ant' => 'int',
		'annioi' => 'int',
		'codigo_pais_extendida' => 'int',
		'codigo_departamento_extendida' => 'int',
		'codigo_municipio_extendida' => 'int',
		'codigo_pais_nacimiento' => 'int',
		'codigo_departamento_nacimiento' => 'int',
		'codigo_municipio_nacimiento' => 'int',
		'codigo_titulo_diversificado' => 'int',
		'codigo_tipo_establecimiento' => 'int',
		'codigo_pais_establecimiento' => 'int',
		'codigo_departamento_establecimiento' => 'int',
		'codigo_municipio_establecimiento' => 'int',
		'etnia' => 'float',
		'idioma' => 'float',
		'otroIdioma' => 'float',
		'activo' => 'int'
	];

	protected $dates = [
		'fec_nac',
		'fecha_u'
	];

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'lit_orien',
		'cod_orien',
		'nombre1',
		'nombre2',
		'nombre',
		'primer_apellido',
		'segundo_apellido',
		'direccion',
		'codigo_municipio_recide',
		'codigo_departamento_recide',
		'cod_postal',
		'fec_nac',
		'sexo',
		'lug_nac',
		'cod_nac',
		'est_civ',
		'telefono',
		'celular',
		'empresa',
		'usuario',
		'fecha_u',
		'carnet_ant',
		'annioi',
		'email',
		'pin',
		'nit',
		'numero_folio',
		'numero_libro',
		'numero_partida',
		'numero_orden',
		'numero_registro',
		'tipo_cui',
		'cui',
		'codigo_pais_extendida',
		'codigo_departamento_extendida',
		'codigo_municipio_extendida',
		'codigo_pais_nacimiento',
		'codigo_departamento_nacimiento',
		'codigo_municipio_nacimiento',
		'codigo_titulo_diversificado',
		'year_de_graduacion',
		'nombre_establecimiento',
		'codigo_tipo_establecimiento',
		'direccion_establecimiento',
		'codigo_pais_establecimiento',
		'codigo_departamento_establecimiento',
		'codigo_municipio_establecimiento',
		'numero_pasaporte',
		'etnia',
		'idioma',
		'otroIdioma',
		'activo',
		'observaciones',
		'pin_hash',
		'remember_token'
	];


    public function departamento()
    {
        return $this->belongsTo('App\Models\Departamento', 'codigo_departamento_recide', 'codigo');
    }

    public function getMunicipio()
    {
        return Municipio::where('cod_depto', $this->codigo_departamento_recide)
            ->where('cod_muni',$this->codigo_municipio_recide)->firstOrFail();
    }

    public function  postal()
    {
        return $this->belongsTo('App\Models\Postal','cod_postal','cod_postal')
            ->where('cod_depto', '=', $this->codigo_departamento_recide)
            ->where('cod_muni', '=',$this->codigo_municipio_recide);
    }

    public function paisNacimiento()
    {
        return $this->belongsTo('App\Models\Pais','codigo_pais_nacimiento','codigo');
    }

    public function departamentoNacimiento()
    {
        return $this->belongsTo('App\Models\Departamento', 'codigo_departamento_nacimiento','codigo');
    }

    public function municipioNacimiento()
    {
        return $this->belongsTo('App\Models\Municipio','codigo_municipio_nacimiento','cod_muni')
        ->where('cod_depto', $this->codigo_departamento_nacimiento);
    }

    /**
     * Retorna el nombre completo del estudiante
     * @return string
     */
    public function getNombreCompleto(){
        $nombre = $this->nombre1;

        if ($this->nombre2){
            $nombre .=  " " . $this->nombre2;
        }
        if ($this->nombre){
            $nombre .=  " " . $this->nombre;
        }
        $nombre .= " " . $this->primer_apellido . " " . $this->segundo_apellido;

        return $nombre;
    }

    public function  getApellido1()
    {
        return $this->primer_apellido;
    }

    public function  getApellido2()
    {
        return $this->segundo_apellido;
    }

    public function  getOtrosNombres()
    {
        return $this->nombre;
    }

    public function  getNov()
    {
        return $this->cod_orien;
    }

    public  function getCui()
    {
        return $this->cui;
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

	public function getActivo(){
		
		return $this->activo;
	}

    public  function getCorreo()
    {
        return $this->email;
    }

    public function  getFechaNacimiento(){
        return Carbon::parse($this->fec_nac)->format('d/m/Y');
    }

    /**
     * Retorna si el aspirante es extranjero o no
     * @return bool
     */
    public function esExtranjero(){
        return ($this->numero_orden == 'PAS');
    }
}
