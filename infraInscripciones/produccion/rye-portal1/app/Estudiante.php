<?php

namespace App;

use App\Notifications\Estudiante\EstudianteResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

/**
 * @property int carnet
 * @property string nombre1
 * @property string nombre2
 * @property string nombre
 * @property string primer_apellido
 * @property string segundo_apellido
 * @property string email
 * @property string tipo_cui puede ser 'DPI' o 'PAS'
 */
class Estudiante extends Authenticatable
{
    use Notifiable;

    protected $table = 'estudia_old';
    protected $primaryKey = 'carnet';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'carnet',
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
        'remember_token',
		'verification_state',
        'verification_token',
        'last_login',
        'last_email_recovery',
        'cod_discapacidad'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pin', 'pin_hash', 'remember_token',
    ];  
    
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->pin_hash;
    }

    /**
     * Get the username for the user.
     *
     * @return string
     */
    public function getAuthIdentifier()
    {
        return $this->carnet;
    }
    
    /**
     * Get the attribute for password reset.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->carnet;
    }
    
    /**
     * Chooses the notification style based on driver.
     *
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
                return trim($this->email);
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
        $this->notify(new EstudianteResetPassword($token));
    }

    /**
     * Retorna el nombre completo del estudiante
     * Nombres Apellidos
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

    /**
     * Retorna verdadero si el estudiante es Extranjero de lo contrario retorna falso
     * @return bool
     */
    public function esExtranjero(){
        return ($this->tipo_cui == 'PAS');
    }
}
