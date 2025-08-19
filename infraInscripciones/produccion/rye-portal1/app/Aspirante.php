<?php

namespace App;

use App\Notifications\Aspirante\AspiranteResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

/**
 * @property mixed nov
 * @property string nombre1
 * @property string nombre2
 * @property string otros_nombres
 * @property string apellido1
 * @property string apellido2
 * @property string correo_electronico
 * @property string pin_hash
 * @property string numero_orden
 */
class Aspirante extends Authenticatable
{
    use Notifiable;

    protected $table = 'informacion_aspirante';
    protected $primaryKey = 'nov';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nov',
		'apellido1',
		'apellido2',
		'nombre1',
		'nombre2',
		'otros_nombres',
		'direccion',
		'muni_recide',
		'depto_recide',
		'cod_Postal',
		'tipoDiversificado',
		'cod_titulo_diversificado',
		'f_graduacion',
		'cod_establecimiento',
		'nombre_establecimiento',
		'tipo_establecimiento',
		'direccion_establecimiento',
		'pais_establecimiento',
		'depto_establecimiento',
		'muni_establecimiento',
		'postalEstablecimiento',
		'nacionalidad',
		'fecha_nacimiento',
		'correo_electronico',
		'etnia',
		'idioma_etnia',
		'idioma_gt',
		'idioma_no_gt',
		'sexo',
		'estado_civil',
		'telefono',
		'celular',
		'proveedor_cel',
		'numero_orden',
		'numero_registro',
		'numero_pasaporte',
		'numero_partida',
		'numero_libro',
		'numero_folio',
		'pais_extendida',
		'depto_extendida',
		'muni_extendida',
		'pais_nac',
		'depto_nac',
		'muni_nac',
		'pin',
		'nit',
		'confirmado',
        'pin_hash',
        'remember_token',
		'verification_state',
        'verification_token',
        'last_login',
        'last_email_recovery'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pin','pin_hash', 'remember_token',
		//'verification_state',
		//'verification_token'
    ];    
    
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        $pin = bcrypt($this->pin);
        return $pin;
    }

    /**
     * Get the username for the user.
     *
     * @return string
     */
    public function getAuthIdentifier()
    {
        return $this->nov;
    }
    
    /**
     * Get the attribute for password reset.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->nov;
    }

    /**
     * Chooses the notification style based on driver.
     *
     * @param $driver
     * @return string
     */
    public function routeNotificationFor($driver)
    {
        if (method_exists($this, $method = 'routeNotificationFor'.Str::studly($driver))) {
            return $this->{$method}();
        }

        switch ($driver) {
            case 'database':
                return $this->notifications();
            case 'mail':
                return $this->correo_electronico;
        }
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AspiranteResetPassword($token));
    }

    /**
     * Retorna el nombre completo del estudiante
     * @return mixed|string
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

    public function esExtranjero(){
        return ($this->numero_orden != 'DPI');
    }

}
