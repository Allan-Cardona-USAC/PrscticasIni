<?php

namespace App\PortalAdministrativo;

use Illuminate\Database\Eloquent\Model;

class aspirante extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'aspirantes';
    protected $primaryKey = 'nov';
    public $incrementing = false;


    protected $casts = [
        'nov' => 'int',
        'celular' => 'int',
        'estado_civil' => 'bool',
        'sexo' => 'bool',
        'registro' => 'int',
        'cod_Establecimiento' => 'int',
        'cod_diversificado' => 'int',
        'status' => 'int',
        'enlinea' => 'bool'
    ];

    protected $dates = [
        'fecha_nacimiento',
        'fec_nov',
        'fec_carga'
    ];

    protected $hidden = [
        'remember_token'
    ];

    protected $fillable = [
        'apellido1',
        'apellido2',
        'nombre1',
        'nombre2',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'celular',
        'fecha_nacimiento',
        'estado_civil',
        'sexo',
        'orden',
        'registro',
        'cod_Establecimiento',
        'nombre_establecimiento',
        'direccion_establecimiento',
        'cod_diversificado',
        'titulo_diversificado',
        'status',
        'pin',
        'correo',
        'enlinea',
        'fec_nov',
        'fec_carga',
        'usuario',
        'pin_hash',
        'remember_token',
        'email_verified_at'
    ];

    public $timestamps = false;
}
